$(function() {
  var per = 3.94;

  $("#size").change(function() {
    $(".opt").show();
    $(".opt").removeAttr("selected");
    if ($(this).val() == "8.5x11") {
      $("#intermediate").hide();
      $("#high").hide();
      $("#primary").attr("selected", "");
    } else if ($(this).val() == "7x9") {
      $("#primary").hide();
      $("#junior").hide();
      $("#high").hide();
      $("#intermediate").attr("selected", "");
    } else if ($(this).val() == "5x8") {
      $("#primary").hide();
      $("#junior").hide();
      $("#intermediate").hide();
      $("#french").hide();
      $("#english").attr("selected", "");
      $("#high").attr("selected", "");
    }
  });

  $(".checkBox").click(function() {
    if ($(this).prop("checked")) {
      if ($(this).attr("id") == "ruler") {
        per = per + 0.25;
      } if ($(this).attr("id") == "pocket") {
        per = per + 0.6;
      }
    } else{
        if ($(this).attr("id") == "ruler") {
          per = per - 0.25;
        } if ($(this).attr("id") == "pocket") {
          per = per - 0.6;
        }
    }
  });

  $(".check").change(function() {
    $("#total").html((parseFloat($("#quantity").val()) * per).toFixed(2));
  });

  $("#addToCart").click(function() {
    $(".toast").toast({ delay: 2000 });
    $(".toast").toast("show");
  });
});
