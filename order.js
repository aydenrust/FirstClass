$(function() {
  var per = 3.94;

  $("#size").change(function() {
    //setting extra pages dropdowns to disabled by default
    $(".pgs").attr("disabled", "");
    //checking if the total needs to be adjusted when the size changes
    if ($("#xtrapgs").is(":checked")) {
      if ($("#pgsJ").is(":visible")) {
        per = per - parseFloat($("#pgsJ").val());
      } else {
        per = per - parseFloat($("#pgsH").val());
      }
      updateTotal(per);
    }
    //showing all dropdown options by default
    $(".opt").show();
    //making it so no options have the selected attribute
    $(".opt").removeAttr("selected");
    //unchecking the extra pages option
    $("#xtrapgs").prop("checked", false);
    if ($(this).val() == "8.5x11") {
      $("#boardpgs").hide();
      $("#pgsH").hide();
      $("#intermediate").hide();
      $("#high").hide();
      $("#primary").attr("selected", "");
    } else if ($(this).val() == "7x9") {
      $("#boardpgs").hide();
      $("#pgsH").hide();
      $("#primary").hide();
      $("#junior").hide();
      $("#high").hide();
      $("#intermediate").attr("selected", "");
    } else if ($(this).val() == "5x8") {
      $("#boardpgs").show();
      $("#board").prop("checked", true);
      $("#pgsJ").hide();
      $("#primary").hide();
      $("#junior").hide();
      $("#intermediate").hide();
      $("#french").hide();
      $("#english").attr("selected", "");
      $("#high").attr("selected", "");
    }
  });

  var first;

  $(".pgs")
    .focus(function() {
      first = parseFloat($(this).val());
    })
    .change(function() {
      per = per + ($(this).val() - first);
      first = parseFloat($(this).val());
      updateTotal(per);
    });

  $(".checkBox").click(function() {
    if ($(this).prop("checked")) {
      if ($(this).attr("id") == "xtrapgs") {
        per = selectedPgs(per);
      } else {
        per = per + parseFloat($(this).val());
      }
    } else {
      if ($(this).attr("id") == "xtrapgs") {
        per = deselectedPgs(per);
      } else {
        per = per - parseFloat($(this).val());
      }
    }
  });

  $(".check").change(function() {
    updateTotal(per);
  });

  $("#addToCart").click(function() {
    console.log("works");
    $(".toast").toast({ delay: 2000 });
    $(".toast").toast("show");
  });

  $("#xtrapgs").click(function() {
    if ($(this).is(":checked")) {
      $(".pgs").removeAttr("disabled");
    } else {
      $(".pgs").attr("disabled", "");
    }
  });
});

function selectedPgs(per) {
  if ($("#pgsJ").is(":visible")) {
    per = per + parseFloat($("#pgsJ").val());
  } else {
    per = per + parseFloat($("#pgsH").val());
  }
  return per;
}

function deselectedPgs(per) {
  if ($("#pgsJ").is(":visible")) {
    per = per - parseFloat($("#pgsJ").val());
  } else {
    per = per - parseFloat($("#pgsH").val());
  }
  return per;
}

function updateTotal(per) {
  $("#total").html((parseFloat($("#quantity").val()) * per).toFixed(2));
}

function showSnack() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function modalCheck() {
if($("#xtrapgs").is(":checked")){
showSnack();
}else{
  $('#confirmModal').modal('show');
}
}