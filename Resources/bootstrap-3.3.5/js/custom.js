$(document).ready(function ()
	{
		var counter = 1;
		
		$("#addrow").on("click", function () 
		{
			var selectValue = $('#select').val();
			var selectText = $("#select option:selected").text();
			
			if(selectValue != 0)
			{
				
				var selectValueSplit = selectValue.split(",");
				var selectItemId = selectValueSplit[0];
				var selectItemPrice = selectValueSplit[1];
				var selectItemUnit = selectValueSplit[2];
				
				$('#extras').show();
				$('#order').show();
				
				counter++;
				
				var newRow = $("<tr>");
				var cols = "";
				cols += '<td>'+
							'<input type="hidden" class="form-control" value='+selectItemId+' readonly id="product_id" name="ref_item[]"/>'+
							'<input type="text" class="form-control" value='+selectText+' readonly id="product" name="product"/>'+
						'</td>';
				cols += '<td>'+
							'<input type="text"  class="form-control" value='+selectItemPrice+' readonly id="price" name="unit_price[]"/>'+
						'</td>';
				cols += '<td>'+
							'<input type="text" class="form-control"    id="qty" name="qty[]"/>'+
						'</td>';
				cols += '<td>'+
							'<input type="text" class="form-control" value='+selectItemUnit+' readonly id="unit" name="unit[]"/>'+
						'</td>';
				cols += '<td>'+
							'<input type="text" class="form-control" id="linetotal" name="unit_total[]" readonly="readonly"/>'+
						'</td>';
				cols += '<td>'+
							'<a class="deleteRow btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span> </a>'+
						'</td>';
				newRow.append(cols);
				
				$("table.order-list").append(newRow);
				
				
			}
			else
				alert('Select Product');
		});
		
		$("table.order-list").on("keyup", 'input[name^="unit_price"], input[name^="qty"]', function (event) 
		{
			calculateRow($(this).closest("tr"));
			calculateGrandTotal();
		});
		
		$("table.order-list").on("click", "a.deleteRow", function (event) 
		{
			$(this).closest("tr").remove();
			calculateGrandTotal();
		});
		
		
		
	});
    
	function calculateRow(row)
	{
		var price = +row.find('input[name^="unit_price"]').val();
		var qty = +row.find('input[name^="qty"]').val();
		row.find('input[name^="unit_total"]').val((price * qty).toFixed(2));
	}
    
	function calculateGrandTotal() 
	{
		var grandTotal = 0;
		$("table.order-list").find('input[name^="unit_total"]').each(function () {
			grandTotal += +$(this).val();
		});
		$("#grandtotal").val(grandTotal.toFixed(2));
		
		
		var totalPriceWithoutTax = grandTotal.toFixed(2);
		var tax = $('#tax').val();
		//$('#tax').val(tax);
		var totalTax = (tax/100)*totalPriceWithoutTax;
		document.getElementById('totalTax').value=totalTax.toFixed(2);
					
		var total = parseInt(totalPriceWithoutTax)+parseInt(totalTax);
		document.getElementById('total').value=total.toFixed(2);
		
	}
	
	function isNumberKey(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;

		return true;
	}
	
	
	
	
	
	