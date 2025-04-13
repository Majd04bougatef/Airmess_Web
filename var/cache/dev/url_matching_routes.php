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
        '/dashboardPage' => [[['_route' => 'dashboard_page', '_controller' => 'App\\Controller\\AdminController::dashboardPage'], null, null, null, false, false, null]],
        '/UserPage' => [[['_route' => 'user_page', '_controller' => 'App\\Controller\\AdminController::UserPage'], null, null, null, false, false, null]],
        '/StationPage' => [[['_route' => 'station_page', '_controller' => 'App\\Controller\\AdminController::stationPage'], null, null, null, false, false, null]],
        '/BonplanPage' => [[['_route' => 'bonplan_page', '_controller' => 'App\\Controller\\AdminController::bonplanPage'], null, null, null, false, false, null]],
        '/OffrePage' => [[['_route' => 'offre_page', '_controller' => 'App\\Controller\\AdminController::offrePage'], null, null, null, false, false, null]],
        '/SocialPage' => [[['_route' => 'social_page', '_controller' => 'App\\Controller\\AdminController::socialPage'], null, null, null, false, false, null]],
        '/base' => [[['_route' => 'app_base', '_controller' => 'App\\Controller\\BaseController::index'], null, null, null, false, false, null]],
        '/commentaire' => [[['_route' => 'app_commentaire_index', '_controller' => 'App\\Controller\\CommentaireController::index'], null, ['GET' => 0], null, true, false, null]],
        '/commentaire/new' => [[['_route' => 'app_commentaire_new', '_controller' => 'App\\Controller\\CommentaireController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/dashboardEntreprisePage' => [[['_route' => 'dashboardEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::dashboardEntreprisePage'], null, null, null, false, false, null]],
        '/UserEntreprisePage' => [[['_route' => 'userEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::UserEntreprisePage'], null, null, null, false, false, null]],
        '/StationEntreprisePage' => [[['_route' => 'stationEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::stationEntreprisePage'], null, null, null, false, false, null]],
        '/BonplanEntreprisePage' => [[['_route' => 'bonplanEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::bonplanEntreprisePage'], null, null, null, false, false, null]],
        '/OffreEntreprisePage' => [[['_route' => 'offreEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::offreEntreprisePage'], null, null, null, false, false, null]],
        '/SocialEntreprisePage' => [[['_route' => 'socialEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::socialEntreprisePage'], null, null, null, false, false, null]],
        '/message' => [[['_route' => 'app_message_index', '_controller' => 'App\\Controller\\MessageController::index'], null, ['GET' => 0], null, false, false, null]],
        '/message/new' => [[['_route' => 'app_message_new', '_controller' => 'App\\Controller\\MessageController::new'], null, ['POST' => 0], null, false, false, null]],
        '/message/chatVoyageurs' => [[['_route' => 'app_message_voyageurs', '_controller' => 'App\\Controller\\MessageController::chatVoyageurs'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/reservation/transport' => [[['_route' => 'app_reservation_transport_index', '_controller' => 'App\\Controller\\ReservationTransportController::index'], null, ['GET' => 0], null, false, false, null]],
        '/reservation/transport/new2' => [[['_route' => 'app_reservation_transport_new', '_controller' => 'App\\Controller\\ReservationTransportController::new2'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/social/media' => [[['_route' => 'app_social_media_index', '_controller' => 'App\\Controller\\SocialMediaController::index'], null, ['GET' => 0], null, false, false, null]],
        '/social/media/new' => [[['_route' => 'app_social_media_new', '_controller' => 'App\\Controller\\SocialMediaController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/station' => [[['_route' => 'app_station_index', '_controller' => 'App\\Controller\\StationController::index'], null, ['GET' => 0], null, false, false, null]],
        '/station/new' => [[['_route' => 'app_station_new', '_controller' => 'App\\Controller\\StationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, false, false, null]],
        '/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/dashboardVoyageursPage' => [[['_route' => 'dashboardVoyageurs_page', '_controller' => 'App\\Controller\\VoyageursController::dashboardVoyageursPage'], null, null, null, false, false, null]],
        '/UserVoyageursPage' => [[['_route' => 'userVoyageurs_page', '_controller' => 'App\\Controller\\VoyageursController::UserVoyageursPage'], null, null, null, false, false, null]],
        '/StationVoyageursPage' => [[['_route' => 'stationVoyageurs_page', '_controller' => 'App\\Controller\\VoyageursController::stationVoyageursPage'], null, null, null, false, false, null]],
        '/BonplanVoyageursPage' => [[['_route' => 'bonplanVoyageurs_page', '_controller' => 'App\\Controller\\VoyageursController::bonplanVoyageursPage'], null, null, null, false, false, null]],
        '/OffreVoyageursPage' => [[['_route' => 'offreVoyageurs_page', '_controller' => 'App\\Controller\\VoyageursController::offreVoyageursPage'], null, null, null, false, false, null]],
        '/SocialVoyageursPage' => [[['_route' => 'socialVoyageurs_page', '_controller' => 'App\\Controller\\VoyageursController::socialVoyageursPage'], null, null, null, false, false, null]],
        '/OffreForm' => [[['_route' => 'offre_form', '_controller' => 'App\\Controller\\VoyageursController::offreForm'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\loginController::login'], null, null, null, false, false, null]],
        '/sign-up' => [[['_route' => 'app_signup', '_controller' => 'App\\Controller\\loginController::signup'], null, null, null, false, false, null]],
        '/dash' => [[['_route' => 'app_dash', '_controller' => 'App\\Controller\\loginController::dash'], null, null, null, false, false, null]],
        '/dashEntreprise' => [[['_route' => 'app_dashEntreprise', '_controller' => 'App\\Controller\\loginController::dashEntreprise'], null, null, null, false, false, null]],
        '/dashVoyageurs' => [[['_route' => 'app_dashVoyageurs', '_controller' => 'App\\Controller\\loginController::dashVoyageurs'], null, null, null, false, false, null]],
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
                .'|/commentaire/(?'
                    .'|ajouter/([^/]++)(*:234)'
                    .'|([^/]++)(?'
                        .'|(*:253)'
                        .'|/(?'
                            .'|edit(?'
                                .'|(*:272)'
                                .'|\\-ajax(*:286)'
                            .')'
                            .'|delete(*:301)'
                            .'|like(*:313)'
                        .')'
                    .')'
                .')'
                .'|/message/([^/]++)/(?'
                    .'|show(*:349)'
                    .'|edit(*:361)'
                    .'|delete(*:375)'
                .')'
                .'|/reservation/transport/(?'
                    .'|new/([^/]++)(*:422)'
                    .'|show/([^/]++)(*:443)'
                    .'|([^/]++)(?'
                        .'|/edit(*:467)'
                        .'|(*:475)'
                    .')'
                    .'|c(?'
                        .'|ardsStation(*:499)'
                        .'|onfirm(*:513)'
                    .')'
                    .'|recap/([^/]++)(*:536)'
                    .'|payment/([^/]++)(*:560)'
                .')'
                .'|/s(?'
                    .'|ocial/media/(?'
                        .'|(\\d+)(*:594)'
                        .'|(\\d+)/edit(*:612)'
                        .'|(\\d+)/like(*:630)'
                        .'|(\\d+)/dislike(*:651)'
                        .'|(\\d+)/commentaire(*:676)'
                        .'|(\\d+)(*:689)'
                    .')'
                    .'|tation/(?'
                        .'|([^/]++)(?'
                            .'|(*:719)'
                            .'|/edit(*:732)'
                            .'|(*:740)'
                        .')'
                        .'|dashEntreprise(*:763)'
                    .')'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:790)'
                    .'|/edit(*:803)'
                    .'|(*:811)'
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
        234 => [[['_route' => 'ajouter_commentaire', '_controller' => 'App\\Controller\\CommentaireController::ajouterCommentaire'], ['idEB'], ['POST' => 0], null, false, true, null]],
        253 => [[['_route' => 'app_commentaire_show', '_controller' => 'App\\Controller\\CommentaireController::show'], ['idC'], ['GET' => 0], null, false, true, null]],
        272 => [[['_route' => 'app_commentaire_edit', '_controller' => 'App\\Controller\\CommentaireController::edit'], ['idC'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        286 => [[['_route' => 'app_commentaire_edit_ajax', '_controller' => 'App\\Controller\\CommentaireController::editAjax'], ['idC'], ['POST' => 0], null, false, false, null]],
        301 => [[['_route' => 'app_commentaire_delete', '_controller' => 'App\\Controller\\CommentaireController::delete'], ['idC'], ['POST' => 0], null, false, false, null]],
        313 => [[['_route' => 'app_commentaire_like', '_controller' => 'App\\Controller\\CommentaireController::likeCommentaire'], ['idC'], ['POST' => 0], null, false, false, null]],
        349 => [[['_route' => 'app_message_show', '_controller' => 'App\\Controller\\MessageController::show'], ['id'], ['GET' => 0], null, false, false, null]],
        361 => [[['_route' => 'app_message_edit', '_controller' => 'App\\Controller\\MessageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        375 => [[['_route' => 'app_message_delete', '_controller' => 'App\\Controller\\MessageController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        422 => [[['_route' => 'app_reservation_transport_new_reservation', '_controller' => 'App\\Controller\\ReservationTransportController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        443 => [[['_route' => 'app_reservation_transport_show', '_controller' => 'App\\Controller\\ReservationTransportController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        467 => [[['_route' => 'app_reservation_transport_edit', '_controller' => 'App\\Controller\\ReservationTransportController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        475 => [[['_route' => 'app_reservation_transport_delete', '_controller' => 'App\\Controller\\ReservationTransportController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        499 => [[['_route' => 'app_reservation_transport_station', '_controller' => 'App\\Controller\\ReservationTransportController::cardStation'], [], ['GET' => 0], null, false, false, null]],
        513 => [[['_route' => 'app_reservation_transport_confirm', '_controller' => 'App\\Controller\\ReservationTransportController::confirm'], [], ['POST' => 0], null, false, false, null]],
        536 => [[['_route' => 'app_reservation_transport_recap', '_controller' => 'App\\Controller\\ReservationTransportController::recap'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        560 => [[['_route' => 'app_reservation_transport_payment', '_controller' => 'App\\Controller\\ReservationTransportController::payment'], ['id'], ['GET' => 0], null, false, true, null]],
        594 => [[['_route' => 'app_social_media_show', '_controller' => 'App\\Controller\\SocialMediaController::show'], ['idEB'], ['GET' => 0], null, false, true, null]],
        612 => [[['_route' => 'app_social_media_edit', '_controller' => 'App\\Controller\\SocialMediaController::edit'], ['idEB'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        630 => [[['_route' => 'app_social_media_like', '_controller' => 'App\\Controller\\SocialMediaController::like'], ['idEB'], ['POST' => 0], null, false, false, null]],
        651 => [[['_route' => 'app_social_media_dislike', '_controller' => 'App\\Controller\\SocialMediaController::dislike'], ['idEB'], ['POST' => 0], null, false, false, null]],
        676 => [[['_route' => 'app_social_media_ajouter_commentaire', '_controller' => 'App\\Controller\\SocialMediaController::ajouterCommentaire'], ['idEB'], ['POST' => 0], null, false, false, null]],
        689 => [[['_route' => 'app_social_media_delete', '_controller' => 'App\\Controller\\SocialMediaController::delete'], ['idEB'], ['POST' => 0], null, false, true, null]],
        719 => [[['_route' => 'app_station_show', '_controller' => 'App\\Controller\\StationController::show'], ['idS'], ['GET' => 0], null, false, true, null]],
        732 => [[['_route' => 'app_station_edit', '_controller' => 'App\\Controller\\StationController::edit'], ['idS'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        740 => [[['_route' => 'app_station_delete', '_controller' => 'App\\Controller\\StationController::delete'], ['idS'], ['POST' => 0], null, false, true, null]],
        763 => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\StationController::dashboard'], [], null, null, false, false, null]],
        790 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id_U'], ['GET' => 0], null, false, true, null]],
        803 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id_U'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        811 => [
            [['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id_U'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
