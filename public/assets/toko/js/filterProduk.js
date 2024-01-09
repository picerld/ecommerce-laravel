function filterProducts() {
    const checkboxes = document.querySelectorAll('.checkbox-filter input[type="checkbox"]');
    const products = document.querySelectorAll('.products .product');

    let selectedCategories = [];

    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            selectedCategories.push(checkbox.id.replace('category-', ''));
        }
    });

    products.forEach(product => {
        const productCategory = product.getAttribute('data-category');
        const isVisible = selectedCategories.includes(productCategory);

        if (isVisible) {
            product.style.display = 'block';
        } else {
            product.style.display = 'none';
        }
    });
}
