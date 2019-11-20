$(function() {
  var per = 3.94;

  $("#7x9").hide();
  $("#5x8").hide();

  $(".big").css("opacity", "0.4");
  $(".med").css("opacity", "0.4");
  $(".small").css("opacity", "0.4");
  $(".coverSelect").attr("disabled", true);
  $(".bubig").removeAttr("disabled");
  $(".big").css("opacity", "1");
  $(".big")
    .next()
    .attr("class", "bottom-right-hidden");

  $("#age").change(function() {
    $(".plannerImg").hide();
    $(".opt").show();
    $(".pgs").show();

    $(".opt").removeAttr("selected");

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

    if ($(this).val() == "kind") {
      $("#kindImg").show();
      $("#pgsH").hide();
      $("#7x9").hide();
      $("#5x8").hide();
      $("#85x11").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "primary") {
      $("#primaryImg").show();
      $("#pgsH").hide();
      $("#7x9").hide();
      $("#5x8").hide();
      $("#85x11").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "intermediate") {
      $("#intImg").show();
      $("#pgsH").hide();
      $("#5x8").hide();
      $("#85x11").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "junior") {
      $("#juniorImg").show();
      $("#pgsH").hide();
      $("#5x8").hide();
      $("#85x11").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "high") {
      $("#highImg").show();
      $("#boardpgs").show();
      $("#board").prop("checked", true);
      $("#pgsJ").hide();
      $("#85x11").hide();
      $("#7x9").attr("selected", "");
      $("#size").change();
    }
  });

  $("#size").change(function() {
    // $(".pgs").show();
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
    //$(".opt").show();
    //making it so no options have the selected attribute
    //$(".opt").removeAttr("selected");
    $(".big").css("opacity", "0.3");
    $(".med").css("opacity", "0.3");
    $(".small").css("opacity", "0.3");
    $(".coverSelect").attr("disabled", true);
    $(".cover")
      .next()
      .attr("class", "bottom-right");
    //unchecking the extra pages option
    $("#xtrapgs").prop("checked", false);
    if ($(this).val() == "8.5x11") {
      $(".bubig").removeAttr("disabled");
      $(".big").css("opacity", "1");
      $(".big")
        .next()
        .attr("class", "bottom-right-hidden");
    } else if ($(this).val() == "7x9") {
      $(".bumed").removeAttr("disabled");
      $(".med").css("opacity", "1");
      $(".med")
        .next()
        .attr("class", "bottom-right-hidden");
    } else if ($(this).val() == "5x8") {
      $(".busmall").removeAttr("disabled");
      $(".small").css("opacity", "1");
      $(".small")
        .next()
        .attr("class", "bottom-right-hidden");
    }
  });

  $("#customCover").click(function() {
    if ($("#customCover").prop("checked")) {
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
  setTimeout(function() {
    x.className = x.className.replace("show", "");
  }, 3000);
}

function addToCart() {
  var size = $("#size").val();
  var age = $("#age").val();
  var lang = $("#lang").val();
  var quantity = $("#quantity").val();
  var ruler = false;
  var pocket = false;
  var pgs = 0;
  if ($("#ruler").is(":checked")) {
    ruler = true;
  }
  if ($("#pocket").is(":checked")) {
    pocket = true;
  }
  if ($("#xtrapgs").is(":checked")) {
    if ($("#pgsJ").is(":visible")) {
      pgs = parseFloat($("#pgsJ").val());
    } else {
      pgs = parseFloat($("#pgsH").val());
    }
  }

  $.ajax({
    type: "POST",
    url: "addCart.php",
    data: {
      data: name
    }
  });
}

function modalCheck() {
  if ($("#pocket").is(":checked")) {
    showSnack();
    addToCart();
  } else {
    $("#confirmModal").modal("show");
  }
}
