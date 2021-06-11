$(function() {
  var per = 5.05;

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
    per = 5.05;
    updateTotal(per);
    $("#note").hide();
    $(".plannerImg").hide();
    $('#ruler').prop('checked', true);
    $('#pocket').prop('checked', true);
    $(".opt").show();
    $(".pgs").show();
    $("#boardpgs").hide();
    $(".xtra").show();
    $(".opt").removeAttr("selected");
    $("#xtrapgs").prop('checked', false);
    $(".pgs").attr("disabled", "");
    //checking if the total needs to be adjusted when the size changes
    // if ($("#xtrapgs").is(":checked")) {
    //   //if ($("#pgsJ").is(":visible")) {

    //     per = per - (parseFloat($("#pgsJ").val()) * 0.05);
    //   //} else {
    //     //per = per - parseFloat($("#pgsH").val());
    //   //}
    //   updateTotal(per);
    // }

    if ($(this).val() == "Kindergarten") {
      $("#kindImg").show();
      $("#pgsH").hide();
      $("#7x9").hide();
      $("#5x8").hide();
      $("#7x92").hide();
      $("#5x82").hide();
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
      $("#note").show();
      $("#highImg").show();
      $("#boardpgs").show();
      $("#board").prop("checked", true);
      $("#85x11").hide();
      $("#7x9").hide();
      $("#7x92").hide();
      $("#5x82").hide();
      $(".sec").hide();
      $("#french").hide();
      $("#5x8").attr("selected", "");
      $("#size").change();
    } else if ($(this).val() == "Teacher Planner") {
      $("#teachImg").show();
      $('#ruler').prop('checked', false);
      $('#pocket').prop('checked', false);
      $("#french").hide();
      $(".xtra").hide();
      $("#7x9").hide();
      $("#85x11").hide();
      $("#5x8").hide();
      $("#pgsH").hide();
      $("#5x82").hide();
      $("#7x92").attr("selected", "");
      $("#size").change();
      per = 6.00;
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
   
   // if(("#age").val() == "Teacher Planner"){

    //}else{

    
    
    //showing all dropdown options by default
    //$(".opt").show();
    //making it so no options have the selected attribute
    //$(".opt").removeAttr("selected");
    $(".big").addClass("greyed");
    $(".med").addClass("greyed");
    $(".small").addClass("greyed");
    $(".teach").addClass("greyed");
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
      $("#bigrad").prop("checked", true);
      $(".bubig").removeAttr("disabled");
      $("#schoolboardpgs").val("Includes 8 board pages & 8 school pages");
      //$(".big").css("opacity", "1");
      $(".big").removeClass("greyed");
      $(".big")
        .next()
        .attr("class", "bottom-right-hidden");
    } else if ($(this).val() == "7x9") {
      $("#medrad").prop("checked", true);
      if($("#age").val() == "Teacher Planner"){
        $(".buteach").removeAttr("disabled");
        $("#schoolboardpgs").val("No Board or School Pages");
        $(".teach").removeClass("greyed");
        $(".teach").next().attr("class", "bottom-right-hidden");
        $(".buteach").attr('checked', true);
      }else{
      $(".bumed").removeAttr("disabled");
      $("#schoolboardpgs").val("Includes 8 board pages & 8 school pages");
      //$(".med").css("opacity", "1");
      $(".med").removeClass("greyed");
      $(".med")
        .next()
        .attr("class", "bottom-right-hidden");
      }
    } else if ($(this).val() == "5x8") {
      $("#smallrad").prop("checked", true);
      $(".busmall").removeAttr("disabled");
      $("#schoolboardpgs").val("Includes 16 board pages & 16 school pages");
      //$(".small").css("opacity", "1");
      $(".small").removeClass("greyed");
      $(".small")
        .next()
        .attr("class", "bottom-right-hidden");
    }
  //}
  });

  $("input[type=radio][name=cover]").change(function() {
    updateTotal(per);
  });

  var first;

   $(".pgs")
     .focus(function() {
       first = parseFloat((($(this).val())/2) * 0.10);
     })
     .change(function() {
       console.log("pgs change");
       per = per + ((parseFloat((($(this).val())/2) * 0.10)) - first);
       first = parseFloat((($(this).val())/2) * 0.10);
       updateTotal(per);
     });

  $(".checkBox").click(function() {
    console.log("checkbox");
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

  // var previous = 2;
  //  $("#pgsJ").change(function() {
  //    var direction = previous < $(this).val();
  //    previous = $(this).val();
  //    if (direction){
  //      per = selectedPgs(per);
  //    }
  //    else{
  //      per = deselectedPgs(per);
  //    }
  //    updateTotal(per);
  //  });

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
  console.log("selected");
  if ($("#pgsJ").is(":visible")) {
    per = per + (((parseFloat($("#pgsJ").val()))/2) * 0.10);
  } else {
    per = per + (((parseFloat($("#pgsH").val()))/2) * 0.10);
  }
  return per;
}

function deselectedPgs(per) {
  console.log("deselected");
  if ($("#pgsJ").is(":visible")) {
    per = per - (((parseFloat($("#pgsJ").val()))/2) * 0.10);
  } else {
    per = per - (((parseFloat($("#pgsH").val()))/2) * 0.10);
  }
  return per;
}

function updateTotal(per) {
  var custom = 0;
  if ($("input[name=cover]:checked").val() == "custom") {
    custom = 350;
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
  var schoolboardpgs = $("#schoolboardpgs").val();
  var size = $("#size").val();
  var age = $("#age").val();
  var lang = $("#lang").val();
  var quantity = $("#quantity").val();
  var ruler = "no";
  var pocket = "no";
  var bully = "no";
  var green = "no";
  var nutrition = "no";
  var pgs = 0;
  var total = $("#total").html();
  var cover = $("input[name='cover']:checked").val();
  if ($("#ruler").is(":checked")) {
    ruler = "yes";
  }
  if ($("#pocket").is(":checked")) {
    pocket = "yes";
  }
  if ($("#bully").is(":checked")) {
    bully = "yes";
  }
  if ($("#green").is(":checked")) {
    green = "yes";
  }
  if ($("#nutrition").is(":checked")) {
    nutrition = "yes";
  }
  if ($("#xtrapgs").is(":checked")) {
    if ($("#pgsJ").is(":visible")) {
      var value = parseFloat($("#pgsJ").val());
      pgs = value;
    } else {
      var value = parseFloat($("#pgsH").val());
      pgs = value;
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
      bully: bully,
      green: green,
      nutrition: nutrition,
      pgs: pgs,
      total: total,
      cover: cover,
      schoolboardpgs: schoolboardpgs
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
