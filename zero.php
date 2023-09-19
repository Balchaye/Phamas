<div class="col-md-1">
        <input id="batch_id_<?php echo $row_number; ?>" name="BATCH_ID" class="form-control" list="batch_list_<?php echo $row_number; ?>" placeholder="Selec Batch" onkeydown="batchOptions(this.value, 'batch_list_<?php echo $row_number; ?>');" onfocus="batchOptions(this.value, 'batch_list_<?php echo $row_number; ?>');" onchange="fillFields(this.value, '<?php echo $row_number; ?>');">
        <code class="text-danger small font-weight-bold float-right" id="medicine_name_error_<?php echo $row_number; ?>" style="display: none;"></code>
        <datalist id="batch_list_<?php echo $row_number; ?>" style="display: none; max-height: 200px; overflow: auto;">
          <?php showMedicineList("") ?>
        </datalist>
      </div>
      function batchOptions(number, id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById(id).innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/add_new_invoice.php?action=batch_list&number=" + number.trim(), true);
  xhttp.send();
}