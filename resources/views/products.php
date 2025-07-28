<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Products - ZMARTs</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans text-gray-800">

  <!-- Navbar -->
  <header class="bg-white shadow fixed top-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-3xl font-extrabold text-green-600 tracking-wide cursor-default select-none">ZMARTS</h1>
      <a href="/" class="text-gray-700 hover:text-green-600 font-semibold transition-colors duration-300">Home</a>
    </div>
  </header>

  <main class="pt-28 max-w-7xl mx-auto px-6">

    <!-- Search Bar -->
    <div class="mb-12 max-w-md mx-auto">
      <input
        type="text"
        id="searchInput"
        placeholder="Search products..."
        class="w-full px-5 py-3 text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-green-300 focus:border-green-500 transition"
        onkeyup="filterProducts()"
        aria-label="Search products"
        autocomplete="off"
      />
    </div>

    <!-- Product Grid -->
    <section>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <!-- Product 1 -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="https://beautyofjoseon.com/cdn/shop/files/25_03c2048c-e103-4c79-8ba9-f398102959d5.jpg?v=1752501175&width=800" class="w-full rounded-t" />
                <div class="p-4">
                    <h4 class="text-lg font-semibold">Calming Serum : Green tea + Panthenol</h4>
                    <p class="text-sm text-gray-600 mt-1">A cooling, calming serum to instantly soothe stressed or reactive skin. Made with a high concentration of mugwort extract and green tea to reduce the look of redness..</p>
                    <p class="mt-2 text-green-600 font-bold">$12.00</p>
                    <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="https://beautyofjoseon.com/cdn/shop/files/4_8459dc1c-943b-49bc-9715-ce7aa3566f7f.jpg?v=1752495430&width=3000" class="w-full rounded-t" />
                <div class="p-4">
                    <h4 class="text-lg font-semibold">Glow Serum : Propolis + Niacinamide</h4>
                    <p class="text-sm text-gray-600 mt-1">A cushiony smoothing serum with niacinamide and propolis extract that helps refine pores, hydrate, and calm reactive skin for a glassy glow.</p>
                    <br>
                    <p class="mt-2 text-green-600 font-bold">$15.00</p>
                    <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="https://beautyofjoseon.com/cdn/shop/files/41.jpg?v=1752562947&width=3000" class="w-full rounded-t" />
                <div class="p-4">
                    <h4 class="text-lg font-semibold">Dynasty Cream</h4>
                    <p class="text-sm text-gray-600 mt-1">Our best-selling creamy moisturizer that sinks in for long-lasting hydration and leaves skin looking dewy, plump, and bouncy.</p>
                    <br>
                    <br>
                    <p class="mt-2 text-green-600 font-bold">$18.00</p>
                    <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="https://beautyofjoseon.com/cdn/shop/files/43.jpg?v=1752502702&width=30000" class="w-full rounded-t" />
                <div class="p-4">
                    <h4 class="text-lg font-semibold">Green Plum Refreshing Toner : AHA + BHA</h4>
                    <p class="text-sm text-gray-600 mt-1">A gentle yet effective smoothing toner that helps reset your skin’s natural glow by sweeping away dead skin cells and cleansing clogged pores. Formulated with mung bean extract, AHA, and BHA.</p>
                    <p class="mt-2 text-green-600 font-bold">$22.00</p>
                    <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="https://beautyofjoseon.com/cdn/shop/files/38.jpg?v=1752495523&width=3000" class="w-full rounded-t" />
                <div class="p-4">
                    <h4 class="text-lg font-semibold">Daily Tinted Fluid Sunscreen</h4>
                    <p class="text-sm text-gray-600 mt-1">A barrier-boosting essence packed with ginseng water and niacinamide for lasting hydration, antioxidant benefits, and a glow boost..</p>
                    <p class="mt-2 text-green-600 font-bold">$14.00</p>
                    <br>
                    <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="https://beautyofjoseon.com/cdn/shop/files/37.jpg?v=1752498896&width=3000" class="w-full rounded-t" />
                <div class="p-4">
                    <h4 class="text-lg font-semibold">Revive Eye Serum : Ginseng + Retinal</h4>
                    <p class="text-sm text-gray-600 mt-1">A powerful Korean eye cream with a fast-absorbing serum texture that helps target the look of wrinkles, brighten, and hydrate for firmer-looking refreshed under eyes.</p>
                    <p class="mt-2 text-green-600 font-bold">$25.00</p>
                    <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="https://beautyofjoseon.com/cdn/shop/files/13_3a01dac5-6554-4a3b-ba8d-8a47d02de069.jpg?v=1752496130&width=3000" class="w-full rounded-t" />
                <div class="p-4">
                    <h4 class="text-lg font-semibold">Ground Rice and Honey Glow Mask</h4>
                    <p class="text-sm text-gray-600 mt-1">A wash-off mask made with Korean rice extracts and honey to help brighten, soothe, hydrate, and gently exfoliate skin in one step.</p>
                    <p class="mt-2 text-green-600 font-bold">$19.00</p>
                    <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img src="https://beautyofjoseon.com/cdn/shop/files/10_e0679d3c-f7ff-4eb2-b145-c6e7441884be.jpg?v=1752505209&width=3000" class="w-full rounded-t" />
                <div class="p-4">
                    <h4 class="text-lg font-semibold">Deep Double Cleansing Duo</h4>
                    <p class="text-sm text-gray-600 mt-1">Your dream team for a revitalizing daily double cleanse. Includes our Ginseng Cleansing Oil and Green Plum Refreshing Cleanser. </p>
                    <p class="mt-2 text-green-600 font-bold">$27.00</p>
                    <br>
                    <a href="/login" class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Buy Now</a>
                </div>
            </div>

        </div>
      <!-- Add more products as needed -->

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
