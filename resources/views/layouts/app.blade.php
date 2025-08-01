<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZMART - Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-600">ZMART</h1>
            <nav class="space-x-4">
                <a href="#features" class="text-gray-700 hover:text-green-600">Features</a>
                <a href="#products" class="text-gray-700 hover:text-green-600">Products</a>
                <a href="#testimonials" class="text-gray-700 hover:text-green-600">Reviews</a>
                <a href="#cta" class="text-gray-700 hover:text-green-600">Join</a>
                <a href="/login" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="pt-24 pb-16 bg-green-50 text-center">
        <div class="mt-10">
      <img src="{{ asset('images/zmart.png') }}" alt="MyShop Logo" class="mx-auto w-48 max-w-full object-contain rounded-lg" />
    </div>
  <div class="max-w-3xl mx-auto px-4">
    <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-6">
      Everything You Need<br>Delivered Fast.
    </h1>
    <p class="text-lg text-gray-700 mb-8">
      Find the best products at unbeatable prices. Your one-stop online shop.
    </p>
    <a href="/products" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-green-700 transition">
      Shop Now
    </a>

  </div>
</section>




    <!-- Features -->
    <section id="features" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-10">Why Shop With Us?</h3>
            <div class="grid md:grid-cols-3 gap-10">
                <div>
                    <img src="https://img.icons8.com/fluency/48/fast-cart.png" class="mx-auto mb-4" />
                    <h4 class="text-xl font-semibold">Fast Delivery</h4>
                    <p class="text-gray-600 mt-2">We deliver to your door in record time — safely and reliably.</p>
                </div>
                <div>
                    <img src="https://img.icons8.com/fluency/48/discount.png" class="mx-auto mb-4" />
                    <h4 class="text-xl font-semibold">Best Prices</h4>
                    <p class="text-gray-600 mt-2">Unbeatable deals, regular offers, and bundle discounts.</p>
                </div>
                <div>
                    <img src="https://img.icons8.com/fluency/48/warranty-card.png" class="mx-auto mb-4" />
                    <h4 class="text-xl font-semibold">Quality Guarantee</h4>
                    <p class="text-gray-600 mt-2">Only the top-rated products make it to our shelves.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section id="products" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h3 class="text-3xl font-bold text-center mb-10">Top Picks For You</h3>
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
    </div>
</section>


    <!-- Testimonials -->
    <section id="testimonials" class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold mb-10">What Our Customers Say</h3>
            <div class="grid md:grid-cols-3 gap-6 text-left">
                <div class="bg-gray-50 p-6 rounded shadow">
                    <p>“Fast delivery and excellent customer service. I'll shop again!”</p>
                    <p class="mt-4 font-semibold text-green-600"> Ayesha K.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded shadow">
                    <p>“The best prices online and product quality is top notch!”</p>
                    <p class="mt-4 font-semibold text-green-600"> Rahim U.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded shadow">
                    <p>“Got my order in 2 days. I was surprised at how smooth it was.”</p>
                    <p class="mt-4 font-semibold text-green-600"> Tanvir A.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section id="cta" class="py-20 bg-green-600 text-white text-center">
        <h3 class="text-3xl font-bold mb-4">Ready to Shop?</h3>
        <p class="mb-6 text-lg">Create an account and start exploring amazing deals today.</p>
        <a href="/register" class="bg-white text-green-600 font-bold px-6 py-3 rounded hover:bg-gray-100">Join Now</a>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>© {{ date('Y') }} ZMART. Built with ❤️ by Jakaria Kollol & his team</p>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>
