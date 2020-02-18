$(function() {
  var per = 4.84;

  $("#7x9").hide();
  $("#5x8").hide();
  $("#7x92").hide();
  $("#5x82").hide();

  // $(".big").css("opacity", "0.4");
  $(".big").addClass("greyed");
  $(".med").addClass("greyed");
  $(".small").addClass("greyed");

  //$(".coverSelect").class("cs1");
  $(".coverSelect").children('img').css("opacity", 1);
  
  // $(".med").css("opacity", "0.4");
  //$(".small").css("opacity", "0.4");
  $(".coverSelect").attr("disabled", true);
  $(".bubig").removeAttr("disabled");
  //$(".big").css("opacity", "1");
  $(".big").removeClass("greyed");
  $(".big")
    .next()
    .attr("class", "bottom-right-hidden");

  $("#age").change(function() {
    per = 4.84;
    updateTotal(per);
    $(".plannerImg").hide();
    $('#ruler').prop('checked', true);
    $('#pocket').prop('checked', true);
    $(".opt").show();
    $(".pgs").show();
    $("#boardpgs").hide();
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

    if ($(this).val() == "Kindergarten") {
      $("#kindImg").show();
      $("#pgsH").hide();
      $("#7x9").hide();
      $("#5x8").hide();
      $("#85x11").attr("selected", "");
      $("#french").hide();
      $("#size").change();
 
    } else if ($(this).val() == "Primary") {
      $("#primaryImg").show();
      $("#pgsH").hide();
      $("#7x9").hide();
      $("#5x8").hide();
      $("#7x92").hide();
      $("#5x82").hide();
      $("#85x11").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "Intermediate") {
      $("#intImg").show();
      $("#pgsH").hide();
      $("#5x8").hide();
      $("#7x92").hide();
      $("#5x82").hide();
      $("#85x11").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "Junior") {
      $("#juniorImg").show();
      $("#pgsH").hide();
      $("#7x92").hide();
      $("#5x82").hide();
      $("#5x8").hide();
      $("#85x11").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "High") {
      $("#highImg").show();
      $("#boardpgs").show();
      $("#board").prop("checked", true);
      $("#pgsJ").hide();
      $("#85x11").hide();
      $("#french").hide();
      $("#7x9").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "Parent Teacher Handbook") {
      $("#7x9").hide();
      $("#pgsH").hide();
      $("#7x92").hide();
      $("#5x82").hide();
      $("#85x11").attr("selected", "");
      $("#size").change();
      per = 2.65;
      updateTotal(per);
    }
  });

  $("#size").change(function() {
    $(".coverSelect").prop("checked", false);
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
    $(".big").addClass("greyed");
    $(".med").addClass("greyed");
    $(".small").addClass("greyed");
    //$(".big").css("opacity", "0.3");
    //$(".med").css("opacity", "0.3");
    //$(".small").css("opacity", "0.3");
    $(".coverSelect").attr("disabled", true);
    $(".cover")
      .next()
      .attr("class", "bottom-right");
    //unchecking the extra pages option
    $("#xtrapgs").prop("checked", false);
    if ($(this).val() == "8.5x11") {
      $(".bubig").removeAttr("disabled");
      //$(".big").css("opacity", "1");
      $(".big").removeClass("greyed");
      $(".big")
        .next()
        .attr("class", "bottom-right-hidden");
    } else if ($(this).val() == "7x9") {
      $(".bumed").removeAttr("disabled");
      //$(".med").css("opacity", "1");
      $(".med").removeClass("greyed");
      $(".med")
        .next()
        .attr("class", "bottom-right-hidden");
    } else if ($(this).val() == "5x8") {
      $(".busmall").removeAttr("disabled");
      //$(".small").css("opacity", "1");
      $(".small").removeClass("greyed");
      $(".small")
        .next()
        .attr("class", "bottom-right-hidden");
    }
  });

  $("input[type=radio][name=cover]").change(function() {
    updateTotal(per);
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
  var custom = 0;
  if ($("input[name=cover]:checked").val() == "custom") {
    custom = 275;
  } else {
    custom = 0;
  }
  $("#total").html(
    (parseFloat($("#quantity").val()) * per + custom).toFixed(2)
  );
}

function showSnack() {
  addToCart();
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
  var ruler = "no";
  var pocket = "no";
  var pgs = 0;
  var total = $("#total").html();
  var cover = $("input[name='cover']:checked").val();
  if ($("#ruler").is(":checked")) {
    ruler = "yes";
  }
  if ($("#pocket").is(":checked")) {
    pocket = "yes";
  }
  if ($("#xtrapgs").is(":checked")) {
    if ($("#pgsJ").is(":visible")) {
      var value = parseFloat($("#pgsJ").val());
      switch (value) {
        case 0.4:
          pgs = 1;
          break;
        case 0.6:
          pgs = 2;
          break;
      }
    } else {
      var value = parseFloat($("#pgsH").val());
      switch (value) {
        case 0.2:
          pgs = 3;
          break;
        case 0.25:
          pgs = 4;
          break;
        case 0.3:
          pgs = 5;
          break;
        case 0.35:
          pgs = 6;
          break;
      }
    }
  }

  $.ajax({
    type: "POST",
    url: "addToCart.php",
    data: {
      size: size,
      age: age,
      lang: lang,
      quantity: quantity,
      ruler: ruler,
      pocket: pocket,
      pgs: pgs,
      total: total,
      cover: cover
    }
  });
}

function modalCheck() {
  if ($("#pocket").is(":checked")) {
    showSnack();
  } else {
    $("#confirmModal").modal("show");
  }
}
