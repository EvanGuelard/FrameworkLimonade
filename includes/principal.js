$(document).ready(function(){
    

    $('#tab_donnees_perso').DataTable({
         "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });
    $('#tab_promotions').DataTable({
         "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });
    $('#tab_fichiers').DataTable({
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            },
            {
                "targets": [ 1 ],
                "visible": false
            }
            
        ],
        
        "order": [[ 1, "asc" ]],
        
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });
    
    $(".popup").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
   
    $('.option').click(function(){
        $( ".cache" ).show();
    });
    
    $("#bouton_ajouter").click(function(){
        $("#ajout" ).show();
        $("#modif" ).hide();
        $("#suppr" ).hide();
    });

    $("#bouton_modifier").click(function(){
        $("#ajout" ).hide();
        $("#modif" ).show();
        $("#suppr" ).hide();
    });
    
    $("#bouton_supprimer").click(function(){
        $("#ajout" ).hide();
        $("#modif" ).hide();
        $("#suppr" ).show();
    });
    
    $(document).on( "click", ".paginate_button", loadPopup );
    
    function loadPopup() {
        console.log("ok2");  
        $(".popup").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
    }

    
});