// Attente chargement complet du DOM
$(function () {

    /// OVERLAY MAP ///
    // Fonction permettant d'afficher l'iframe de la map dans un overlay par dessus la page
    function openAdressIframe() {

        // Création de l'overlay
        let overlay = $('<div></div>');

        overlay.addClass('overlay');

        // Création de l'image
        let image = $('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5478.166884958194!2d4.362563524386692!3d46.64486686653032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f3b68b6402f8f5%3A0x144553e0a1cfae97!2sscm%20Charles%20Colombier%20Terrier%20Lev%C3%AAque%20Zaremba!5e0!3m2!1sfr!2sfr!4v1625654982204!5m2!1sfr!2sfr" width="80%" height="60%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>');

        // Ajout de l'image dans l'overlay
        overlay.append(image);

        // Ajout de l'overlay dans la page
        $('body').append(overlay);

        //création d'une classe close pour indiquer à l'utilisateur que l'overlay peut-être fermé
        let closeButton = $('<div class="close mt-1 me-1"><i class="far fa-window-close"></i></div>');
        overlay.prepend(closeButton);

        // Si l'overlay est cliqué, on appel la fonction permettant de la supprimer
        overlay.click(function () {
            removeAdressIframe();
        });

    }

    // Fonction permettant de supprimer l'overlay
    function removeAdressIframe() {
        $('.overlay').remove();
    }

    // Si l'adresse est cliquée, appel de la fonction permettant d'afficher l'iframe de l'adresse
    $('#office-address').click(function () {
        openAdressIframe();
    });


    ///SYSTEME DE TABULATION///
    // Mise en place d'un écouteur d'évènement "click" sur tous les boutons du système de tabulation
    $('.tab-container .tabs .tab').click(function(){

        // On retire la classe "active" de l'ancien bouton
        $('.tab-container .tabs .tab.active').removeClass('active');

        // On met la classe "active" sur le bouton cliqué
        $(this).addClass('active');

        // On retire la classe "active" de l'ancienne vue pour la masquer
        $('.tab-container .views .view.active').removeClass('active');

        // On met la classe "active" sur la vue qui doit affichée (la vue dont l'id correspond au dataset data-open du bouton cliqué)
        $('#' + $(this).data('open') ).addClass('active');

    });



});