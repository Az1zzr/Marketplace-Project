package services;

import Entities.Commande;
import com.itextpdf.text.*;
import com.itextpdf.text.pdf.PdfPCell;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;

import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.time.LocalDate;

public class PDFService {

    /**
     * Génère un PDF professionnel pour une commande
     * 
     * @param commande   La commande à générer en PDF
     * @param outputPath Le chemin où sauvegarder le PDF
     * @return Le chemin du fichier PDF généré
     */
    public String genererPDFCommande(Commande commande, String outputPath) throws IOException, DocumentException {
        // Créer un dossier de destination s'il n'existe pas
        File dir = new File(outputPath);
        if (!dir.exists()) {
            dir.mkdirs();
        }

        // Générer le nom du fichier
        String filename = "Commande_" + commande.getNumeroCommande() + "_" + System.currentTimeMillis() + ".pdf";
        String filePath = outputPath + File.separator + filename;

        // Créer le document PDF
        Document document = new Document(PageSize.A4, 50, 50, 50, 50);
        PdfWriter.getInstance(document, new FileOutputStream(filePath));
        document.open();

        try {
            // ===== EN-TÊTE =====
            Font titleFont = new Font(Font.FontFamily.HELVETICA, 24, Font.BOLD, BaseColor.BLACK);
            Paragraph header = new Paragraph("FACTURE / BON DE COMMANDE", titleFont);
            header.setAlignment(Element.ALIGN_CENTER);
            header.setSpacingAfter(5);
            document.add(header);

            // Ligne de séparation
            Paragraph divider = new Paragraph("_________________________________");
            divider.setAlignment(Element.ALIGN_CENTER);
            divider.setSpacingAfter(20);
            document.add(divider);

            // ===== INFORMATIONS DE L'ENTREPRISE ET NUMÉRO DE COMMANDE =====
            PdfPTable headerTable = new PdfPTable(2);
            headerTable.setWidthPercentage(100);

            // Colonne gauche - Infos entreprise
            Font boldFont = new Font(Font.FontFamily.HELVETICA, 12, Font.BOLD, BaseColor.BLACK);
            Font normalFont = new Font(Font.FontFamily.HELVETICA, 10, Font.NORMAL, BaseColor.BLACK);

            PdfPCell leftCell = new PdfPCell();
            leftCell.addElement(new Paragraph("GESTION COMMANDE", boldFont));
            leftCell.addElement(new Paragraph("Tunisie", normalFont));
            leftCell.setBorder(PdfPCell.NO_BORDER);
            leftCell.setPadding(5);
            headerTable.addCell(leftCell);

            // Colonne droite - Numéro et date
            PdfPCell rightCell = new PdfPCell();
            Paragraph numPara = new Paragraph("Numéro Commande: " + commande.getNumeroCommande(), boldFont);
            numPara.setAlignment(Element.ALIGN_RIGHT);
            rightCell.addElement(numPara);

            Paragraph datePara = new Paragraph("Date: " + commande.getDateCommande(), normalFont);
            datePara.setAlignment(Element.ALIGN_RIGHT);
            rightCell.addElement(datePara);

            rightCell.setBorder(PdfPCell.NO_BORDER);
            rightCell.setPadding(5);
            headerTable.addCell(rightCell);

            document.add(headerTable);
            document.add(new Paragraph("\n"));

            // ===== INFORMATIONS CLIENT =====
            Font sectionFont = new Font(Font.FontFamily.HELVETICA, 11, Font.BOLD, BaseColor.BLACK);
            Paragraph clientTitle = new Paragraph("INFORMATIONS CLIENT", sectionFont);
            clientTitle.setSpacingBefore(15);
            clientTitle.setSpacingAfter(5);
            document.add(clientTitle);

            PdfPTable clientTable = new PdfPTable(2);
            clientTable.setWidthPercentage(100);
            clientTable.setWidths(new float[] { 30, 70 });

            PdfPCell cell1 = new PdfPCell(new Paragraph("Client:", boldFont));
            cell1.setBorder(PdfPCell.NO_BORDER);
            cell1.setPadding(5);
            clientTable.addCell(cell1);

            PdfPCell cell2 = new PdfPCell(new Paragraph(commande.getClient(), normalFont));
            cell2.setBorder(PdfPCell.NO_BORDER);
            cell2.setPadding(5);
            clientTable.addCell(cell2);

            PdfPCell cell3 = new PdfPCell(new Paragraph("Adresse:", boldFont));
            cell3.setBorder(PdfPCell.NO_BORDER);
            cell3.setPadding(5);
            clientTable.addCell(cell3);

            PdfPCell cell4 = new PdfPCell(new Paragraph(commande.getAdresseLivraison(), normalFont));
            cell4.setBorder(PdfPCell.NO_BORDER);
            cell4.setPadding(5);
            clientTable.addCell(cell4);

            document.add(clientTable);
            document.add(new Paragraph("\n"));

            // ===== DÉTAILS DE LA COMMANDE =====
            Paragraph detailsTitle = new Paragraph("DÉTAILS DE LA COMMANDE", sectionFont);
            detailsTitle.setSpacingBefore(15);
            detailsTitle.setSpacingAfter(10);
            document.add(detailsTitle);

            PdfPTable detailsTable = new PdfPTable(2);
            detailsTable.setWidthPercentage(100);

            // En-têtes du tableau
            PdfPCell headerCell1 = new PdfPCell(new Paragraph("Montant Total (TND)", boldFont));
            headerCell1.setBackgroundColor(new BaseColor(200, 200, 200));
            headerCell1.setHorizontalAlignment(PdfPCell.ALIGN_CENTER);
            headerCell1.setPadding(8);
            detailsTable.addCell(headerCell1);

            PdfPCell headerCell2 = new PdfPCell(new Paragraph("Statut", boldFont));
            headerCell2.setBackgroundColor(new BaseColor(200, 200, 200));
            headerCell2.setHorizontalAlignment(PdfPCell.ALIGN_CENTER);
            headerCell2.setPadding(8);
            detailsTable.addCell(headerCell2);

            // Contenu
            PdfPCell montantCell = new PdfPCell(
                    new Paragraph(String.format("%.2f TND", commande.getMontantTotal()), boldFont));
            montantCell.setHorizontalAlignment(PdfPCell.ALIGN_CENTER);
            montantCell.setPadding(8);
            detailsTable.addCell(montantCell);

            BaseColor statutColor = getStatutBackgroundColor(commande.getStatut());
            PdfPCell statutCell = new PdfPCell(new Paragraph(commande.getStatut(), boldFont));
            statutCell.setBackgroundColor(statutColor);
            statutCell.setHorizontalAlignment(PdfPCell.ALIGN_CENTER);
            statutCell.setPadding(8);
            detailsTable.addCell(statutCell);

            document.add(detailsTable);
            document.add(new Paragraph("\n"));

            // ===== NOTES =====
            Font smallFont = new Font(Font.FontFamily.HELVETICA, 9, Font.NORMAL, BaseColor.BLACK);
            Paragraph notesTitle = new Paragraph("NOTES:", boldFont);
            notesTitle.setSpacingBefore(30);
            document.add(notesTitle);

            Paragraph noteContent = new Paragraph(
                    "Merci pour votre commande. Veuillez conserver ce document à titre de preuve.", smallFont);
            document.add(noteContent);

            // ===== PIED DE PAGE =====
            Paragraph footer = new Paragraph("Document généré le " + LocalDate.now() + " - Gestion Commande",
                    smallFont);
            footer.setAlignment(Element.ALIGN_CENTER);
            footer.setSpacingBefore(30);
            document.add(footer);

        } finally {
            document.close();
        }

        return filePath;
    }

    /**
     * Obtient la couleur de fond associée au statut
     */
    private BaseColor getStatutBackgroundColor(String statut) {
        return switch (statut) {
            case "Confirmée" -> new BaseColor(76, 175, 80); // Vert
            case "En attente" -> new BaseColor(255, 193, 7); // Orange
            case "Annulée" -> new BaseColor(244, 67, 54); // Rouge
            default -> new BaseColor(158, 158, 158); // Gris
        };
    }
}
