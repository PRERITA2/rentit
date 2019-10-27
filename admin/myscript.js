
// Delete Confirmation for Category
function delete_data(cid)
{
 if(confirm('Are you sure you want to delete this category ?'))
 {
  window.location.href='deletecategory.php?cid='+cid;
 }
}

// approve product
function approve_product(id)
{
 if(confirm('Are you sure you want to approve this product?'))
 {
  window.location.href='approve.php?id='+id;
 }
}

// Enables tooltip
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});

// Disable user
function disable_user(uid)
{
 if(confirm('Are you sure you want to block the user?'))
 {
  window.location.href='disable.php?uid='+uid;
 }
}

function search_user() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}