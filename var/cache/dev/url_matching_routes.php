<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/account/profile' => [[['_route' => 'app_account_profile', '_controller' => 'App\\Controller\\AccountController::profile'], null, null, null, false, false, null]],
        '/categorie' => [[['_route' => 'app_categorie_index', '_controller' => 'App\\Controller\\CategorieController::index'], null, null, null, false, false, null]],
        '/categorie/new' => [[['_route' => 'app_categorie_new', '_controller' => 'App\\Controller\\CategorieController::new'], null, null, null, false, false, null]],
        '/commande' => [[['_route' => 'app_commande_index', '_controller' => 'App\\Controller\\CommandeController::index'], null, null, null, false, false, null]],
        '/commande/new' => [[['_route' => 'app_commande_new', '_controller' => 'App\\Controller\\CommandeController::new'], null, null, null, false, false, null]],
        '/feedback' => [[['_route' => 'app_feedback_index', '_controller' => 'App\\Controller\\FeedbackController::index'], null, null, null, false, false, null]],
        '/feedback/export/pdf' => [[['_route' => 'app_feedback_export_pdf', '_controller' => 'App\\Controller\\FeedbackController::exportPdf'], null, ['GET' => 0], null, false, false, null]],
        '/api/spellcheck' => [[['_route' => 'api_spellcheck', '_controller' => 'App\\Controller\\FeedbackController::spellCheck'], null, ['POST' => 0], null, false, false, null]],
        '/livraison' => [[['_route' => 'app_livraison_index', '_controller' => 'App\\Controller\\LivraisonController::index'], null, null, null, false, false, null]],
        '/produit' => [[['_route' => 'app_produit_index', '_controller' => 'App\\Controller\\ProduitController::index'], null, null, null, false, false, null]],
        '/produit/new' => [[['_route' => 'app_produit_new', '_controller' => 'App\\Controller\\ProduitController::new'], null, null, null, false, false, null]],
        '/role' => [[['_route' => 'app_role_index', '_controller' => 'App\\Controller\\RoleController::index'], null, null, null, false, false, null]],
        '/role/new' => [[['_route' => 'app_role_new', '_controller' => 'App\\Controller\\RoleController::new'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\SecurityController::home'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'app_admin_dashboard', '_controller' => 'App\\Controller\\SecurityController::adminDashboard'], null, null, null, false, false, null]],
        '/front' => [[['_route' => 'app_front_dashboard', '_controller' => 'App\\Controller\\SecurityController::frontDashboard'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\SecurityController::register'], null, null, null, false, false, null]],
        '/forgot-password' => [[['_route' => 'app_forgot_password', '_controller' => 'App\\Controller\\SecurityController::forgotPassword'], null, null, null, false, false, null]],
        '/reset-password/verify' => [[['_route' => 'app_reset_password_verify', '_controller' => 'App\\Controller\\SecurityController::verifyResetPassword'], null, null, null, false, false, null]],
        '/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/c(?'
                    .'|ategorie/([^/]++)/(?'
                        .'|edit(*:232)'
                        .'|delete(*:246)'
                    .')'
                    .'|ommande/(?'
                        .'|ligne/([^/]++)/delete(*:287)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:314)'
                                .'|delete(*:328)'
                            .')'
                            .'|(*:337)'
                        .')'
                    .')'
                .')'
                .'|/feedback/(?'
                    .'|new(?:/(\\d+))?(*:375)'
                    .'|livraison/(\\d+)/new(*:402)'
                    .'|([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:429)'
                            .'|delete(*:443)'
                            .'|reponse/new(*:462)'
                        .')'
                        .'|(*:471)'
                    .')'
                .')'
                .'|/r(?'
                    .'|eponse/([^/]++)/delete(*:508)'
                    .'|ole/([^/]++)/(?'
                        .'|edit(*:536)'
                        .'|delete(*:550)'
                    .')'
                .')'
                .'|/livraison/(?'
                    .'|new/([^/]++)(*:586)'
                    .'|([^/]++)/(?'
                        .'|edit(*:610)'
                        .'|delete(*:624)'
                    .')'
                .')'
                .'|/produit/([^/]++)(?'
                    .'|/(?'
                        .'|edit(*:662)'
                        .'|delete(*:676)'
                        .'|buy(*:687)'
                        .'|qr\\-code(*:703)'
                    .')'
                    .'|(*:712)'
                .')'
                .'|/user/([^/]++)(?'
                    .'|/(?'
                        .'|edit(*:746)'
                        .'|delete(*:760)'
                    .')'
                    .'|(*:769)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        232 => [[['_route' => 'app_categorie_edit', '_controller' => 'App\\Controller\\CategorieController::edit'], ['id'], null, null, false, false, null]],
        246 => [[['_route' => 'app_categorie_delete', '_controller' => 'App\\Controller\\CategorieController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        287 => [[['_route' => 'app_commande_line_delete', '_controller' => 'App\\Controller\\CommandeController::deleteLine'], ['id'], ['POST' => 0], null, false, false, null]],
        314 => [[['_route' => 'app_commande_edit', '_controller' => 'App\\Controller\\CommandeController::edit'], ['id'], null, null, false, false, null]],
        328 => [[['_route' => 'app_commande_delete', '_controller' => 'App\\Controller\\CommandeController::delete'], ['id'], null, null, false, false, null]],
        337 => [[['_route' => 'app_commande_show', '_controller' => 'App\\Controller\\CommandeController::show'], ['id'], null, null, false, true, null]],
        375 => [[['_route' => 'app_feedback_new', 'ligneCommandeId' => null, '_controller' => 'App\\Controller\\FeedbackController::new'], ['ligneCommandeId'], null, null, false, true, null]],
        402 => [[['_route' => 'app_feedback_delivery_new', '_controller' => 'App\\Controller\\FeedbackController::newDeliveryFeedback'], ['livraisonId'], null, null, false, false, null]],
        429 => [[['_route' => 'app_feedback_edit', '_controller' => 'App\\Controller\\FeedbackController::edit'], ['id'], null, null, false, false, null]],
        443 => [[['_route' => 'app_feedback_delete', '_controller' => 'App\\Controller\\FeedbackController::delete'], ['id'], null, null, false, false, null]],
        462 => [[['_route' => 'app_reponse_new', '_controller' => 'App\\Controller\\FeedbackController::addReponse'], ['id'], null, null, false, false, null]],
        471 => [[['_route' => 'app_feedback_show', '_controller' => 'App\\Controller\\FeedbackController::show'], ['id'], null, null, false, true, null]],
        508 => [[['_route' => 'app_reponse_delete', '_controller' => 'App\\Controller\\FeedbackController::deleteReponse'], ['id'], null, null, false, false, null]],
        536 => [[['_route' => 'app_role_edit', '_controller' => 'App\\Controller\\RoleController::edit'], ['id'], null, null, false, false, null]],
        550 => [[['_route' => 'app_role_delete', '_controller' => 'App\\Controller\\RoleController::delete'], ['id'], null, null, false, false, null]],
        586 => [[['_route' => 'app_livraison_new', '_controller' => 'App\\Controller\\LivraisonController::new'], ['commandeId'], null, null, false, true, null]],
        610 => [[['_route' => 'app_livraison_edit', '_controller' => 'App\\Controller\\LivraisonController::edit'], ['id'], null, null, false, false, null]],
        624 => [[['_route' => 'app_livraison_delete', '_controller' => 'App\\Controller\\LivraisonController::delete'], ['id'], null, null, false, false, null]],
        662 => [[['_route' => 'app_produit_edit', '_controller' => 'App\\Controller\\ProduitController::edit'], ['id'], null, null, false, false, null]],
        676 => [[['_route' => 'app_produit_delete', '_controller' => 'App\\Controller\\ProduitController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        687 => [[['_route' => 'app_produit_buy', '_controller' => 'App\\Controller\\ProduitController::buy'], ['id'], ['POST' => 0], null, false, false, null]],
        703 => [[['_route' => 'app_produit_qr_code', '_controller' => 'App\\Controller\\ProduitController::qrCode'], ['id'], ['GET' => 0], null, false, false, null]],
        712 => [[['_route' => 'app_produit_show', '_controller' => 'App\\Controller\\ProduitController::show'], ['id'], null, null, false, true, null]],
        746 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], null, null, false, false, null]],
        760 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], null, null, false, false, null]],
        769 => [
            [['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
