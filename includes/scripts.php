<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Datatable
    $('#example1').DataTable()
    //CK Editor
    CKEDITOR.replace('editor1')
  });
</script>


<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- Custom Scripts -->
<script>
$(function(){

  getCart();



  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'mailbox_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}


// change filliere and year dropbar when chosing 'cycle'
$('#cycle').on('change', function(){
    var html_filiere = '';
    var html_annee = '';
    var current_id = $(this).val();

    if(current_id == "1"){
            html_filiere += '<option class="dis" disabled="disabled">-----------------------------------------------------------------------------</option>'
              +'<option value="1">Actuariat-Finance</option>'
              +'<option value="2">Statistique-Economie Appliqué</option>'
              +'<option value="3">Statistique-Démographie</option>'
              +'<option value="4">Recherche Opérationnelle et Aide à la Décision</option>'
              +'<option value="5">Ingénierie des Données et des Logiciels</option>'
              +'<option value="6">Science des Données</option>';

            html_annee+=
                    '<option value="1">1ere année</option>'+
                    '<option value="2">2eme année</option>'+
                    '<option value="3">3eme année</option>';

        }
    if(current_id == "2"){
            html_filiere += '<option class="dis" disabled="disabled">-----------------------------------------------------------------------------</option>'+
            '<option value="7">Sciences, Ingénierie et Développement Durable</option>';
            html_annee+=
                    '<option value="1">1ere année</option>'+
                    '<option value="2">2eme année</option>';
        }
    if(current_id == "3"){
            html_filiere += '<option class="dis" disabled="disabled">-----------------------------------------------------------------------------</option>'+
              '<option value="8">Laboratoire GES3D</option>'+
              '<option value="9">Laboratoire SI2M </option>'+
              '<option value="10">Laboratoire MASAFEQ</option>';
            html_annee+=
                    '<option value="1">1ere année</option>'+
                    '<option value="2">2eme année</option>'+
                    '<option value="3">3eme année</option>'+
                    '<option value="4">4eme année</option>';
        }

    $('#filiere').html(html_filiere);
    $('#annee').html(html_annee);
});




</script>