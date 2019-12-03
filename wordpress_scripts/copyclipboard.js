	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
document.rea
function copylinkFunction(){
    
    var copyText = document.getElementsByClassName("view-event")[0].href;
      var temp = jQuery("<input>");
          jQuery("body").append(temp);
          temp.val(copyText).select();
          document.execCommand("copy");
          temp.remove();
          jQuery(".copysection").append("<p>Event copied you can share any where</p>");
    //alert(copyText);
      //copyText.select();
      //document.execCommand("copy");
      //alert("Copied the text: " + copyText.value);
      //copyText.select();
      //document.execCommand("copy");
      //alert("Copied the text: " + copyText);
}
</script>