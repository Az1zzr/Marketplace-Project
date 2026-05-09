package Controller;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.geometry.Pos;
import javafx.scene.control.*;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import models.Conversation;
import models.ConversationMessage;
import models.User;
import services.MessagingService;
import utils.SessionManager;

import java.time.format.DateTimeFormatter;
import java.util.List;

public class MessagingController {
    @FXML private ComboBox<User> supplierCombo;
    @FXML private Button startConversationButton;
    @FXML private Button refreshButton;
    @FXML private ListView<Conversation> conversationList;
    @FXML private VBox messagesBox;
    @FXML private TextArea messageField;
    @FXML private Button sendButton;
    @FXML private Label conversationTitle;
    @FXML private Label helperLabel;

    private final MessagingService messagingService = new MessagingService();
    private final ObservableList<Conversation> conversations = FXCollections.observableArrayList();
    private final DateTimeFormatter dateFormatter = DateTimeFormatter.ofPattern("dd/MM HH:mm");
    private Conversation selectedConversation;

    @FXML
    public void initialize() {
        configureConversationList();
        configureSupplierPicker();
        conversationList.setItems(conversations);
        conversationList.getSelectionModel().selectedItemProperty().addListener((obs, oldValue, newValue) -> openConversation(newValue));
        refresh();
    }

    @FXML
    private void refresh() {
        Conversation previouslySelected = selectedConversation;
        conversations.setAll(messagingService.findConversationsForCurrentUser());
        if (previouslySelected != null) {
            conversations.stream()
                    .filter(c -> c.getId() == previouslySelected.getId())
                    .findFirst()
                    .ifPresent(c -> conversationList.getSelectionModel().select(c));
        }
        if (selectedConversation == null && !conversations.isEmpty()) {
            conversationList.getSelectionModel().selectFirst();
        }
        if (conversations.isEmpty()) {
            renderEmptyState("Aucune conversation pour le moment.");
        }
    }

    @FXML
    private void startConversation() {
        User supplier = supplierCombo.getValue();
        if (supplier == null) {
            showAlert("Sélection requise", "Choisissez un fournisseur.", Alert.AlertType.WARNING);
            return;
        }

        try {
            Conversation conversation = messagingService.startConversation(supplier.getId());
            refresh();
            if (conversation != null) {
                conversations.stream()
                        .filter(c -> c.getId() == conversation.getId())
                        .findFirst()
                        .ifPresent(c -> conversationList.getSelectionModel().select(c));
            }
        } catch (Exception e) {
            showAlert("Erreur", e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    @FXML
    private void sendMessage() {
        if (selectedConversation == null) {
            showAlert("Conversation requise", "Sélectionnez une conversation.", Alert.AlertType.WARNING);
            return;
        }
        String content = messageField.getText() == null ? "" : messageField.getText().trim();
        if (content.isEmpty()) return;

        try {
            if (messagingService.sendMessage(selectedConversation.getId(), content)) {
                messageField.clear();
                openConversation(selectedConversation);
                refresh();
            }
        } catch (Exception e) {
            showAlert("Erreur", e.getMessage(), Alert.AlertType.ERROR);
        }
    }

    private void configureSupplierPicker() {
        boolean canStart = SessionManager.getInstance().isClient();
        supplierCombo.setVisible(canStart);
        supplierCombo.setManaged(canStart);
        startConversationButton.setVisible(canStart);
        startConversationButton.setManaged(canStart);

        if (canStart) {
            supplierCombo.getItems().setAll(messagingService.findAvailableSuppliers());
        }
    }

    private void configureConversationList() {
        conversationList.setCellFactory(list -> new ListCell<>() {
            @Override
            protected void updateItem(Conversation item, boolean empty) {
                super.updateItem(item, empty);
                if (empty || item == null) {
                    setText(null);
                    setGraphic(null);
                    return;
                }

                User viewer = SessionManager.getInstance().getCurrentUser();
                String unread = item.getUnreadCount() > 0 ? "  • " + item.getUnreadCount() + " nouveau(x)" : "";
                Label name = new Label(item.displayNameFor(viewer) + unread);
                name.setStyle("-fx-font-weight: bold; -fx-text-fill: #1e293b;");
                Label preview = new Label(item.getLastMessage() == null ? "Nouvelle conversation" : item.getLastMessage());
                preview.setMaxWidth(245);
                preview.setStyle("-fx-text-fill: #64748b; -fx-font-size: 11px;");
                VBox box = new VBox(4, name, preview);
                box.setStyle("-fx-padding: 8 4;");
                setGraphic(box);
            }
        });
    }

    private void openConversation(Conversation conversation) {
        selectedConversation = conversation;
        messagesBox.getChildren().clear();

        if (conversation == null) {
            renderEmptyState("Sélectionnez une conversation.");
            return;
        }

        User viewer = SessionManager.getInstance().getCurrentUser();
        conversationTitle.setText(conversation.displayNameFor(viewer));
        helperLabel.setText(conversation.getProduitName() == null ? "Messages privés" : "Produit: " + conversation.getProduitName());

        List<ConversationMessage> messages = messagingService.findMessages(conversation.getId());
        if (messages.isEmpty()) {
            renderEmptyState("Aucun message. Envoyez le premier message.");
            return;
        }

        for (ConversationMessage message : messages) {
            messagesBox.getChildren().add(buildMessageBubble(message, viewer));
        }
    }

    private HBox buildMessageBubble(ConversationMessage message, User viewer) {
        boolean mine = viewer != null && message.getSenderId() == viewer.getId();
        Label author = new Label((mine ? "Moi" : message.getSenderName()) +
                (message.getCreatedAt() == null ? "" : " • " + dateFormatter.format(message.getCreatedAt())));
        author.setStyle("-fx-font-size: 10px; -fx-text-fill: " + (mine ? "#fed7aa" : "#64748b") + ";");

        Label content = new Label(message.getContent());
        content.setWrapText(true);
        content.setMaxWidth(520);
        content.setStyle("-fx-font-size: 13px; -fx-text-fill: " + (mine ? "white" : "#1e293b") + ";");

        VBox bubble = new VBox(4, author, content);
        bubble.setMaxWidth(560);
        bubble.setStyle("-fx-background-color: " + (mine ? "#f97316" : "white") + ";" +
                "-fx-background-radius: 14; -fx-padding: 10 12;" +
                "-fx-border-color: " + (mine ? "#f97316" : "#e5e9f0") + "; -fx-border-radius: 14;");

        HBox row = new HBox(bubble);
        row.setAlignment(mine ? Pos.CENTER_RIGHT : Pos.CENTER_LEFT);
        return row;
    }

    private void renderEmptyState(String text) {
        conversationTitle.setText("Messages");
        helperLabel.setText(text);
        messagesBox.getChildren().clear();
        Label empty = new Label(text);
        empty.setStyle("-fx-text-fill: #94a3b8; -fx-font-size: 14px; -fx-padding: 40;");
        messagesBox.getChildren().add(empty);
    }

    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}
