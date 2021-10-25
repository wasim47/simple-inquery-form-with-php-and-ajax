$(document).ready(function() {
///////////////// Keyword /////////////////////////////////						 
  $("#keyword_count").on('keyup', function() {
	var kwords = this.value.match(/\S+/g).length;
	if (kwords > 150) {
	  // Split the string on first 200 words and rejoin on spaces
	  var ktrimmed = $(this).val().split(/\s+/, 150).join(" ");
	  // Add a space at the end to make sure more typing creates new words
	  $(this).val(ktrimmed + " ");
	}
	else {
	  $('#key_display_count').text(kwords);
	  $('#key_word_left').text(150-kwords);
	}
  });
  
  ///////////////// Keyword /////////////////////////////////						 
  $("#desc_count").on('keyup', function() {
	var dwords = this.value.match(/\S+/g).length;
	if (dwords > 150) {
	  // Split the string on first 200 words and rejoin on spaces
	  var dtrimmed = $(this).val().split(/\s+/, 150).join(" ");
	  // Add a space at the end to make sure more typing creates new words
	  $(this).val(dtrimmed + " ");
	}
	else {
	  $('#desc_display_count').text(dwords);
	  $('#desc_word_left').text(150-dwords);
	}
  });
  
  ///////////////// Keyword /////////////////////////////////						 
    var area = document.getElementById("metatitle_txt");
	var message = document.getElementById("metatitle");
	var maxLength = 150;
	var checkLength = function() {
		if(area.value.length < maxLength) {
			message.innerHTML = (maxLength-area.value.length) + " characters remaining";
		}
	}
setInterval(checkLength, 150);
  
});