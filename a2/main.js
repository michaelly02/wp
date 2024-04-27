function redirectToPage() {
    var selectedPage = document.getElementById("redirectSelect").value;

    console.log("Selected page:", selectedPage);
    // console.log("Hike ID:", hikeId);
    if (selectedPage) {
      window.location.href = selectedPage;

      
    }
  }