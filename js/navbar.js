$(document).ready(function () {
  // Get the current page URL parameter
  const urlParams = new URLSearchParams(window.location.search);
  const currentPageParam = urlParams.get("page");
  const currentPage = currentPageParam
    ? `/ppdb/admin/?page=${currentPageParam}`
    : "/ppdb/admin/";

  // Find the active link if there is a "page" request
  if (currentPageParam) {
    // Find the link that matches the current page URL
    const activeLink = document.querySelector(
      `.nav-link[href="${currentPage}"]`
    );
    if (activeLink) {
      // Add the "active" class to the link
      activeLink.classList.add("active");

      // If the link has a parent with class "collapse", expand the collapsed menu
      const parentCollapse = activeLink.closest(".collapse");
      if (parentCollapse) {
        parentCollapse.classList.add("show");

        // Ensure that the "data-bs-parent" attribute is set to the correct value
        const dataParent = parentCollapse.getAttribute("data-bs-parent");
        $(dataParent).collapse("show");
      }
    }
  } else {
    // Handle the case where there is no "page" request
    // Check if the current page matches the base URL "/ppdb/admin/"
    const currentPageURL = new URL(window.location.href).pathname;
    if (currentPageURL === "/ppdb/admin/") {
      // Find the link for the base URL and set it as active
      const baseLink = document.querySelector('.nav-link[href="/ppdb/admin/"]');
      if (baseLink) {
        baseLink.classList.add("active");
      }
    }
  }
});
