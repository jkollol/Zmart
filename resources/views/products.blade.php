<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Products - ZMART</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans text-gray-800">

  <!-- Navbar -->
  <header class="bg-white shadow fixed top-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-green-600">ZMART</h1>
      <a href="/" class="text-gray-700 hover:text-green-600 font-semibold">Home</a>
    </div>
  </header>

  <main class="pt-28 max-w-7xl mx-auto px-4">

    <!-- Search Bar -->
    <div class="mb-10">
      <input
        type="text"
        id="searchInput"
        placeholder="Search products..."
        class="w-full md:w-1/3 p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
        onkeyup="filterProducts()"
        aria-label="Search products"
      />
    </div>

    <!-- Product Grid -->
    <section id="productList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

      <!-- Product 1 -->
      <div class="bg-white rounded-lg shadow hover:shadow-lg transition product-card" data-name="Calming Serum">
        <img src="https://beautyofjoseon.com/cdn/shop/files/25_03c2048c-e103-4c79-8ba9-f398102959d5.jpg?v=1752501175&width=800" alt="Calming Serum" class="w-full rounded-t-lg object-cover h-48" />
        <div class="p-5">
          <h4 class="text-lg font-semibold mb-2">Calming Serum : Green tea + Panthenol</h4>
          <p class="text-gray-600 text-sm mb-4">A cooling, calming serum to instantly soothe stressed or reactive skin. Made with a high concentration of mugwort extract and green tea to reduce the look of redness.</p>
          <p class="text-green-600 font-bold text-lg mb-4">$12.00</p>
          <button class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
            Add to Cart
          </button>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="bg-white rounded-lg shadow hover:shadow-lg transition product-card" data-name="Glow Serum">
        <img src="https://beautyofjoseon.com/cdn/shop/files/4_8459dc1c-943b-49bc-9715-ce7aa3566f7f.jpg?v=1752495430&width=3000" alt="Glow Serum" class="w-full rounded-t-lg object-cover h-48" />
        <div class="p-5">
          <h4 class="text-lg font-semibold mb-2">Glow Serum : Propolis + Niacinamide</h4>
          <p class="text-gray-600 text-sm mb-4">A cushiony smoothing serum with niacinamide and propolis extract that helps refine pores, hydrate, and calm reactive skin for a glassy glow.</p>
          <p class="text-green-600 font-bold text-lg mb-4">$15.00</p>
          <button class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
            Add to Cart
          </button>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="bg-white rounded-lg shadow hover:shadow-lg transition product-card" data-name="Dynasty Cream">
        <img src="https://beautyofjoseon.com/cdn/shop/files/41.jpg?v=1752562947&width=3000" alt="Dynasty Cream" class="w-full rounded-t-lg object-cover h-48" />
        <div class="p-5">
          <h4 class="text-lg font-semibold mb-2">Dynasty Cream</h4>
          <p class="text-gray-600 text-sm mb-4">Our best-selling creamy moisturizer that sinks in for long-lasting hydration and leaves skin looking dewy, plump, and bouncy.</p>
          <p class="text-green-600 font-bold text-lg mb-4">$18.00</p>
          <button class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
            Add to Cart
          </button>
        </div>
      </div>

      <!-- Product 4 -->
      <div class="bg-white rounded-lg shadow hover:shadow-lg transition product-card" data-name="Green Plum Refreshing Toner">
        <img src="https://beautyofjoseon.com/cdn/shop/files/43.jpg?v=1752502702&width=30000" alt="Green Plum Refreshing Toner" class="w-full rounded-t-lg object-cover h-48" />
        <div class="p-5">
          <h4 class="text-lg font-semibold mb-2">Green Plum Refreshing Toner : AHA + BHA</h4>
          <p class="text-gray-600 text-sm mb-4">A gentle yet effective smoothing toner that helps reset your skin’s natural glow by sweeping away dead skin cells and cleansing clogged pores. Formulated with mung bean extract, AHA, and BHA.</p>
          <p class="text-green-600 font-bold text-lg mb-4">$22.00</p>
          <button class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
            Add to Cart
          </button>
        </div>
      </div>

      <!-- Add more products with same style here -->

    </section>

  </main>

  @vite('resources/js/app.js')

  <script>
    function filterProducts() {
      const input = document.getElementById('searchInput');
      const filter = input.value.toLowerCase();
      const products = document.querySelectorAll('.product-card');

      products.forEach(product => {
        const name = product.getAttribute('data-name').toLowerCase();
        if (name.includes(filter)) {
          product.style.display = "";
        } else {
          product.style.display = "none";
        }
      });
    }
  </script>

</body>
</html>
