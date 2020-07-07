$(document).ready(function() {
    $('#example').DataTable();
} );

const bourse = $('#etudiant_Bourse').val();
var type = '';
$('#etudiant_Bourse').change(function () {

    $('select option:selected').each(function (){
        if($(this).val() === '1'){
            type = 'pension';
        }
        if($(this).val() === 2){
            type = 'demi-bourse';
        }
        if($(this).val() === 3){
            type = 'non';
        }
    });
})

if(type === 'pension' || type === 'demi-bourse'){
        $('#choix').html('');
        $('#choix').append('<input type="text">');
}