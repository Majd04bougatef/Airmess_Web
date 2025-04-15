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
        '/admin/create-admins' => [[['_route' => 'app_create_admins', '_controller' => 'App\\Controller\\AdminCreatorController::createAdmins'], null, null, null, false, false, null]],
        '/base' => [[['_route' => 'app_base', '_controller' => 'App\\Controller\\BaseController::index'], null, null, null, false, false, null]],
        '/bon/plan' => [[['_route' => 'app_bonplan_index', '_controller' => 'App\\Controller\\BonPlanController::index'], null, ['GET' => 0], null, false, false, null]],
        '/bon/plan/new' => [[['_route' => 'app_bonplan_new', '_controller' => 'App\\Controller\\BonPlanController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/bon/plan/api/add' => [[['_route' => 'api_bonplan_add', '_controller' => 'App\\Controller\\BonPlanController::apiAdd'], null, ['POST' => 0], null, false, false, null]],
        '/commentaire' => [[['_route' => 'app_commentaire_index', '_controller' => 'App\\Controller\\CommentaireController::index'], null, ['GET' => 0], null, true, false, null]],
        '/commentaire/new' => [[['_route' => 'app_commentaire_new', '_controller' => 'App\\Controller\\CommentaireController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/entreprise/analytics' => [[['_route' => 'app_entreprise_analytics', '_controller' => 'App\\Controller\\DashEntreprise\\AnalyticsController::index'], null, null, null, false, false, null]],
        '/entreprise/analytics/usage' => [[['_route' => 'app_entreprise_analytics_usage', '_controller' => 'App\\Controller\\DashEntreprise\\AnalyticsController::getUsageData'], null, null, null, false, false, null]],
        '/entreprise/analytics/revenue' => [[['_route' => 'app_entreprise_analytics_revenue', '_controller' => 'App\\Controller\\DashEntreprise\\AnalyticsController::getRevenueData'], null, null, null, false, false, null]],
        '/diagnostic/users' => [[['_route' => 'app_diagnostic_users', '_controller' => 'App\\Controller\\DiagnosticController::listUsers'], null, null, null, false, false, null]],
        '/dashboardEntreprisePage' => [[['_route' => 'dashboardEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::dashboardEntreprisePage'], null, null, null, false, false, null]],
        '/UserEntreprisePage' => [[['_route' => 'userEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::UserEntreprisePage'], null, null, null, false, false, null]],
        '/StationEntreprisePage' => [[['_route' => 'stationEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::stationEntreprisePage'], null, null, null, false, false, null]],
        '/BonplanEntreprisePage' => [[['_route' => 'bonplanEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::bonplanEntreprisePage'], null, null, null, false, false, null]],
        '/OffreEntreprisePage' => [[['_route' => 'offreEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::offreEntreprisePage'], null, null, null, false, false, null]],
        '/SocialEntreprisePage' => [[['_route' => 'socialEntreprise_page', '_controller' => 'App\\Controller\\EntrepriseController::socialEntreprisePage'], null, null, null, false, false, null]],
        '/message' => [[['_route' => 'app_message_index', '_controller' => 'App\\Controller\\MessageController::index'], null, ['GET' => 0], null, false, false, null]],
        '/message/new' => [[['_route' => 'app_message_new', '_controller' => 'App\\Controller\\MessageController::new'], null, ['POST' => 0], null, false, false, null]],
        '/message/chatVoyageurs' => [[['_route' => 'app_message_voyageurs', '_controller' => 'App\\Controller\\MessageController::chatVoyageurs'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, null, null, false, false, null]],
        '/reservation/transport' => [[['_route' => 'app_reservation_transport_index', '_controller' => 'App\\Controller\\ReservationTransportController::index'], null, ['GET' => 0], null, false, false, null]],
        '/reservation/transport/new2' => [[['_route' => 'app_reservation_transport_new', '_controller' => 'App\\Controller\\ReservationTransportController::new2'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/reservation/transport/process-payment' => [[['_route' => 'app_reservation_transport_process_payment', '_controller' => 'App\\Controller\\ReservationTransportController::processPayment'], null, ['POST' => 0], null, false, false, null]],
        '/reservation/transport/confirmation' => [[['_route' => 'app_reservation_transport_confirmation', '_controller' => 'App\\Controller\\ReservationTransportController::confirmation'], null, ['GET' => 0], null, false, false, null]],
        '/reservation/transport/confirm' => [[['_route' => 'app_reservation_transport_confirm', '_controller' => 'App\\Controller\\ReservationTransportController::confirm'], null, ['POST' => 0], null, false, false, null]],
        '/reservation/transport/cardsStation' => [[['_route' => 'app_reservation_transport_station', '_controller' => 'App\\Controller\\ReservationTransportController::cardStation'], null, ['GET' => 0], null, false, false, null]],
        '/review/bon/plan' => [[['_route' => 'app_reviewbonplan_index', '_controller' => 'App\\Controller\\ReviewBonPlanController::index'], null, ['GET' => 0], null, false, false, null]],
        '/review/bon/plan/new' => [[['_route' => 'app_reviewbonplan_new', '_controller' => 'App\\Controller\\ReviewBonPlanController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/social/media' => [[['_route' => 'app_social_media_index', '_controller' => 'App\\Controller\\SocialMediaController::index'], null, ['GET' => 0], null, false, false, null]],
        '/social/media/new' => [[['_route' => 'app_social_media_new', '_controller' => 'App\\Controller\\SocialMediaController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/station/dashEntreprise' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\StationController::dashboard'], null, ['GET' => 0], null, false, false, null]],
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
        '/BonplanForm' => [[['_route' => 'bonplan_form', '_controller' => 'App\\Controller\\VoyageursController::bonplanForm'], null, null, null, false, false, null]],
        '/BonplanAdd' => [[['_route' => 'bonplan_add', '_controller' => 'App\\Controller\\VoyageursController::bonplanAdd'], null, ['POST' => 0], null, false, false, null]],
        '/debug-bonplan' => [[['_route' => 'debug_bonplan', '_controller' => 'App\\Controller\\VoyageursController::debugBonplan'], null, null, null, false, false, null]],
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
                .'|/bon/plan/([^/]++)(?'
                    .'|(*:223)'
                    .'|/edit(*:236)'
                    .'|(*:244)'
                .')'
                .'|/commentaire/(?'
                    .'|ajouter/([^/]++)(*:285)'
                    .'|([^/]++)(?'
                        .'|(*:304)'
                        .'|/(?'
                            .'|edit(?'
                                .'|(*:323)'
                                .'|\\-ajax(*:337)'
                            .')'
                            .'|delete(*:352)'
                            .'|like(*:364)'
                        .')'
                    .')'
                .')'
                .'|/message/([^/]++)/(?'
                    .'|show(*:400)'
                    .'|edit(*:412)'
                    .'|delete(*:426)'
                .')'
                .'|/re(?'
                    .'|servation/transport/(?'
                        .'|new/([^/]++)(*:476)'
                        .'|show/([^/]++)(*:497)'
                        .'|([^/]++)/edit(*:518)'
                        .'|payment/([^/]++)(*:542)'
                        .'|recap/([^/]++)(*:564)'
                        .'|([^/]++)(?'
                            .'|(*:583)'
                            .'|/(?'
                                .'|chat(*:599)'
                                .'|message/new(*:618)'
                            .')'
                        .')'
                    .')'
                    .'|view/bon/plan/([^/]++)(?'
                        .'|(*:654)'
                        .'|/edit(*:667)'
                        .'|(*:675)'
                    .')'
                .')'
                .'|/s(?'
                    .'|ocial/media/(?'
                        .'|(\\d+)(*:710)'
                        .'|(\\d+)/edit(*:728)'
                        .'|(\\d+)/like(*:746)'
                        .'|(\\d+)/dislike(*:767)'
                        .'|(\\d+)/commentaire(*:792)'
                        .'|(\\d+)(*:805)'
                    .')'
                    .'|tation/([^/]++)(?'
                        .'|(*:832)'
                        .'|/edit(*:845)'
                        .'|(*:853)'
                    .')'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:880)'
                    .'|/edit(*:893)'
                    .'|(*:901)'
                .')'
                .'|/Bonplan(?'
                    .'|Edit/([^/]++)(*:934)'
                    .'|Update/([^/]++)(*:957)'
                    .'|Delete/([^/]++)(*:980)'
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
        223 => [[['_route' => 'app_bonplan_show', '_controller' => 'App\\Controller\\BonPlanController::show'], ['idP'], ['GET' => 0], null, false, true, null]],
        236 => [[['_route' => 'app_bonplan_edit', '_controller' => 'App\\Controller\\BonPlanController::edit'], ['idP'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        244 => [[['_route' => 'app_bonplan_delete', '_controller' => 'App\\Controller\\BonPlanController::delete'], ['idP'], ['POST' => 0], null, false, true, null]],
        285 => [[['_route' => 'ajouter_commentaire', '_controller' => 'App\\Controller\\CommentaireController::ajouterCommentaire'], ['idEB'], ['POST' => 0], null, false, true, null]],
        304 => [[['_route' => 'app_commentaire_show', '_controller' => 'App\\Controller\\CommentaireController::show'], ['idC'], ['GET' => 0], null, false, true, null]],
        323 => [[['_route' => 'app_commentaire_edit', '_controller' => 'App\\Controller\\CommentaireController::edit'], ['idC'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        337 => [[['_route' => 'app_commentaire_edit_ajax', '_controller' => 'App\\Controller\\CommentaireController::editAjax'], ['idC'], ['POST' => 0], null, false, false, null]],
        352 => [[['_route' => 'app_commentaire_delete', '_controller' => 'App\\Controller\\CommentaireController::delete'], ['idC'], ['POST' => 0], null, false, false, null]],
        364 => [[['_route' => 'app_commentaire_like', '_controller' => 'App\\Controller\\CommentaireController::likeCommentaire'], ['idC'], ['POST' => 0], null, false, false, null]],
        400 => [[['_route' => 'app_message_show', '_controller' => 'App\\Controller\\MessageController::show'], ['id'], ['GET' => 0], null, false, false, null]],
        412 => [[['_route' => 'app_message_edit', '_controller' => 'App\\Controller\\MessageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        426 => [[['_route' => 'app_message_delete', '_controller' => 'App\\Controller\\MessageController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        476 => [[['_route' => 'app_reservation_transport_new_reservation', '_controller' => 'App\\Controller\\ReservationTransportController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        497 => [[['_route' => 'app_reservation_transport_show', '_controller' => 'App\\Controller\\ReservationTransportController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        518 => [[['_route' => 'app_reservation_transport_edit', '_controller' => 'App\\Controller\\ReservationTransportController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        542 => [[['_route' => 'app_reservation_transport_payment', '_controller' => 'App\\Controller\\ReservationTransportController::payment'], ['id'], ['GET' => 0], null, false, true, null]],
        564 => [[['_route' => 'app_reservation_transport_recap', '_controller' => 'App\\Controller\\ReservationTransportController::recap'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        583 => [[['_route' => 'app_reservation_transport_delete', '_controller' => 'App\\Controller\\ReservationTransportController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        599 => [[['_route' => 'app_reservation_transport_chat', '_controller' => 'App\\Controller\\ReservationTransportController::chat'], ['id'], ['GET' => 0], null, false, false, null]],
        618 => [[['_route' => 'app_reservation_message_new', '_controller' => 'App\\Controller\\ReservationTransportController::newMessage'], ['id'], ['POST' => 0], null, false, false, null]],
        654 => [[['_route' => 'app_reviewbonplan_show', '_controller' => 'App\\Controller\\ReviewBonPlanController::show'], ['idR'], ['GET' => 0], null, false, true, null]],
        667 => [[['_route' => 'app_reviewbonplan_edit', '_controller' => 'App\\Controller\\ReviewBonPlanController::edit'], ['idR'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        675 => [[['_route' => 'app_reviewbonplan_delete', '_controller' => 'App\\Controller\\ReviewBonPlanController::delete'], ['idR'], ['POST' => 0], null, false, true, null]],
        710 => [[['_route' => 'app_social_media_show', '_controller' => 'App\\Controller\\SocialMediaController::show'], ['idEB'], ['GET' => 0], null, false, true, null]],
        728 => [[['_route' => 'app_social_media_edit', '_controller' => 'App\\Controller\\SocialMediaController::edit'], ['idEB'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        746 => [[['_route' => 'app_social_media_like', '_controller' => 'App\\Controller\\SocialMediaController::like'], ['idEB'], ['POST' => 0], null, false, false, null]],
        767 => [[['_route' => 'app_social_media_dislike', '_controller' => 'App\\Controller\\SocialMediaController::dislike'], ['idEB'], ['POST' => 0], null, false, false, null]],
        792 => [[['_route' => 'app_social_media_ajouter_commentaire', '_controller' => 'App\\Controller\\SocialMediaController::ajouterCommentaire'], ['idEB'], ['POST' => 0], null, false, false, null]],
        805 => [[['_route' => 'app_social_media_delete', '_controller' => 'App\\Controller\\SocialMediaController::delete'], ['idEB'], ['POST' => 0], null, false, true, null]],
        832 => [[['_route' => 'app_station_show', '_controller' => 'App\\Controller\\StationController::show'], ['idS'], ['GET' => 0], null, false, true, null]],
        845 => [[['_route' => 'app_station_edit', '_controller' => 'App\\Controller\\StationController::edit'], ['idS'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        853 => [[['_route' => 'app_station_delete', '_controller' => 'App\\Controller\\StationController::delete'], ['idS'], ['POST' => 0], null, false, true, null]],
        880 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id_U'], ['GET' => 0], null, false, true, null]],
        893 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id_U'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        901 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id_U'], ['POST' => 0], null, false, true, null]],
        934 => [[['_route' => 'bonplan_edit_form', '_controller' => 'App\\Controller\\VoyageursController::bonplanEditForm'], ['idP'], null, null, false, true, null]],
        957 => [[['_route' => 'bonplan_update', '_controller' => 'App\\Controller\\VoyageursController::bonplanUpdate'], ['idP'], ['POST' => 0], null, false, true, null]],
        980 => [
            [['_route' => 'bonplan_delete', '_controller' => 'App\\Controller\\VoyageursController::bonplanDelete'], ['idP'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
