function redirectToPage() {
    var selectedPage = document.getElementById("redirectSelect").value;
    if (selectedPage) {
      window.location.href = selectedPage;
    }
  }