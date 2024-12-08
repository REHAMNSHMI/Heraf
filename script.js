
<script>
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // منع إرسال النموذج في البداية

    // إظهار النافذة المنبثقة
    document.getElementById('confirmationPopup').style.display = 'flex';
});

// إغلاق النافذة المنبثقة
function closePopup() {
    document.getElementById('confirmationPopup').style.display = 'none';
}

function stayInBrowseMode() {
    alert("البقاء في وضع التصفح. لم يتم إرسال البيانات.");
}

  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByTagName("div");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
   
    history.pushState({tab: tabName}, "", "");
  }

  
  window.addEventListener("popstate", function(event) {
    var tab = event.state.tab;
    if (tab) {
      openTab({currentTarget: document.querySelector(".tab button.active")}, tab);
    }
  });

  function saveFormData() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var country = document.getElementById("country").value;

    alert("تم حفظ البيانات بنجاح!");
    return false; 
  }
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".tablinks").click();
});




</script>
