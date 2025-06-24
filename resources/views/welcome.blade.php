<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SewaSepedaku - Platform SaaS Terdepan untuk Rental Sepeda</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .pulse-animation {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .feature-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .cta-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(102, 126, 234, 0.4);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px 0 rgba(102, 126, 234, 0.6);
        }

        .hero-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%" r="50%"><stop offset="0%" style="stop-color:rgba(255,255,255,0.1)"/><stop offset="100%" style="stop-color:rgba(255,255,255,0)"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)"/><circle cx="800" cy="300" r="150" fill="url(%23a)"/><circle cx="400" cy="700" r="120" fill="url(%23a)"/></svg>') no-repeat center center;
            background-size: cover;
            opacity: 0.3;
        }

        .stats-counter {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
        }

        .pricing-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border: 2px solid transparent;
            background-clip: padding-box;
            position: relative;
            transition: all 0.3s ease;
        }

        .pricing-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: inherit;
            z-index: -1;
            margin: -2px;
        }

        .pricing-card.featured {
            transform: scale(1.05);
            box-shadow: 0 25px 50px -12px rgba(102, 126, 234, 0.25);
        }

        .testimonial-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
        }

        .tech-stack-item {
            transition: all 0.3s ease;
        }

        .tech-stack-item:hover {
            transform: scale(1.1);
        }

        .process-step {
            position: relative;
        }

        .process-step::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -20px;
            width: 40px;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            z-index: 1;
        }

        .process-step:last-child::after {
            display: none;
        }

        @media (max-width: 768px) {
            .process-step::after {
                display: none;
            }
        }

        .benefit-highlight {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border: 1px solid rgba(102, 126, 234, 0.2);
        }
    </style>
</head>

<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-200/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-1 justify-center">
                    <svg class="h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="#3b82f6"
                            d="M352 160c-1.3 0-2.6.1-3.9.2-3.2-33.6-22.3-64.8-48.3-88.8-26.6-24.6-60-39.4-95.8-39.4-44.1 0-85.3 20.3-112.3 54.3-27.1 34-41.7 78.4-41.7 124.9 0 46.5 14.6 90.9 41.7 124.9 27 34 68.2 54.3 112.3 54.3 35.8 0 69.2-14.8 95.8-39.4 26-24 45.1-55.2 48.3-88.8 1.3.1 2.6.2 3.9.2 44.2 0 80-35.8 80-80s-35.8-80-80-80zM204 288c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80zm148-80c-22.1 0-40 17.9-40 40s17.9 40 40 40 40-17.9 40-40-17.9-40-40-40z" />
                    </svg>
                    <span class="text-xl font-bold gradient-text">SewaSepedaku</span>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#fitur" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Fitur</a>
                    <a href="#harga" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Harga</a>
                    <a href="#testimoni"
                        class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Testimoni</a>
                    <a href="#cara-kerja" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Cara
                        Kerja</a>
                    <button onclick="window.location.href ='/login'"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        Login
                    </button>
                </div>

                <div class="md:hidden">
                    <button class="text-gray-700 hover:text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg min-h-screen flex items-center relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="text-white">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-white/20 rounded-full text-sm font-medium mb-6 glass-effect">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 pulse-animation"></span>
                        Platform #1 untuk Rental Sepeda
                    </div>

                    <h1 class="text-5xl lg:text-7xl font-black mb-6 leading-tight">
                        Revolusi
                        <span class="block text-yellow-300">Bisnis Rental</span>
                        Sepeda Anda
                    </h1>

                    <p class="text-xl lg:text-2xl mb-8 text-blue-100 leading-relaxed">
                        Platform SaaS all-in-one yang mengubah cara Anda mengelola rental sepeda.
                        Otomatisasi penuh, efisiensi maksimal, keuntungan berlipat.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <button onclick="window.location.href ='/register'"
                            class="cta-button text-white px-8 py-4 rounded-xl font-bold text-lg inline-flex items-center justify-center">
                            🚀 Coba Gratis 14 Hari
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center space-x-6 text-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span>4.9/5 Rating</span>
                        </div>
                        <div>✅ Tanpa Kartu Kredit</div>
                        <div>⚡ Setup 5 Menit</div>
                    </div>
                </div>

                <div class="relative">
                    <div class="floating-animation">
                        <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 glass-effect">
                            <div class="bg-white rounded-2xl p-6 shadow-2xl">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="font-bold text-gray-900">Dashboard Rental</h3>
                                    <div class="w-3 h-3 bg-green-500 rounded-full pulse-animation"></div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div class="bg-blue-50 p-4 rounded-xl">
                                        <div class="text-2xl font-bold text-blue-600">127</div>
                                        <div class="text-sm text-gray-600">Sepeda Tersedia</div>
                                    </div>
                                    <div class="bg-green-50 p-4 rounded-xl">
                                        <div class="text-2xl font-bold text-green-600">89</div>
                                        <div class="text-sm text-gray-600">Sedang Disewa</div>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                            🚲
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-medium">Mountain Bike Pro</div>
                                            <div class="text-sm text-gray-500">Rp 25,000/jam</div>
                                        </div>
                                        <div class="text-green-600 font-bold">Tersedia</div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                            🚴
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-medium">City Cruiser</div>
                                            <div class="text-sm text-gray-500">Rp 20,000/jam</div>
                                        </div>
                                        <div class="text-orange-600 font-bold">Disewa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="stats-counter gradient-text mb-2">1,000+</div>
                    <div class="text-gray-600 font-medium">Bisnis Rental</div>
                </div>
                <div class="text-center">
                    <div class="stats-counter gradient-text mb-2">50K+</div>
                    <div class="text-gray-600 font-medium">Transaksi/Bulan</div>
                </div>
                <div class="text-center">
                    <div class="stats-counter gradient-text mb-2">99.9%</div>
                    <div class="text-gray-600 font-medium">Uptime</div>
                </div>
                <div class="text-center">
                    <div class="stats-counter gradient-text mb-2">24/7</div>
                    <div class="text-gray-600 font-medium">Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Problem & Solution Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-black text-gray-900 mb-6">
                        Masalah yang Sering <span class="gradient-text">Dihadapi</span>
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                ❌
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Pencatatan Manual</div>
                                <div class="text-gray-600">Risiko kehilangan data, human error, dan sulit tracking</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                ❌
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Stok Tidak Akurat</div>
                                <div class="text-gray-600">Sepeda hilang, double booking, customer kecewa</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                ❌
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Komunikasi Ribet</div>
                                <div class="text-gray-600">WhatsApp personal, susah organize, tidak profesional</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                ❌
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Laporan Tidak Ada</div>
                                <div class="text-gray-600">Tidak tahu performa bisnis, sulit ambil keputusan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-4xl font-black text-gray-900 mb-6">
                        <span class="gradient-text">Solusi</span> SewaSepedaku
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                ✅
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Otomatisasi Total</div>
                                <div class="text-gray-600">Semua tercatat otomatis, real-time, backup cloud</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                ✅
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Smart Inventory</div>
                                <div class="text-gray-600">Tracking real-time, alert otomatis, zero loss</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                ✅
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">WhatsApp Integration</div>
                                <div class="text-gray-600">Template otomatis, profesional, organized</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div
                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                ✅
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Analytics Dashboard</div>
                                <div class="text-gray-600">Insight mendalam, laporan otomatis, data-driven</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6">
                    Fitur yang <span class="gradient-text">Mengubah Permainan</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Semua yang Anda butuhkan untuk menjalankan bisnis rental sepeda modern,
                    terintegrasi dalam satu platform yang powerful.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card p-8 rounded-2xl hover-lift">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H3m2 0h2M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Smart Inventory</h3>
                    <p class="text-gray-600 mb-4">
                        Kelola semua sepeda dengan sistem pintar yang otomatis update stok,
                        status ketersediaan, dan maintenance schedule.
                    </p>
                    <div class="text-blue-600 font-semibold">→ Otomatis & Real-time</div>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-lift">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Customer 360°</h3>
                    <p class="text-gray-600 mb-4">
                        Database customer lengkap dengan history rental, preferensi,
                        dan sistem loyalitas terintegrasi.
                    </p>
                    <div class="text-green-600 font-semibold">→ Relationship Management</div>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-lift">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">WhatsApp Integration</h3>
                    <p class="text-gray-600 mb-4">
                        Booking otomatis via WhatsApp dengan template pesan yang customize,
                        konfirmasi instant, dan follow-up otomatis.
                    </p>
                    <div class="text-purple-600 font-semibold">→ Zero Friction Booking</div>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-lift">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d=d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V7a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Analytics Dashboard</h3>
                    <p class="text-gray-600 mb-4">
                        Dapatkan insight mendalam tentang performa bisnis Anda dengan laporan real-time dan analisis
                        mendalam.
                    </p>
                    <div class="text-orange-600 font-semibold">→ Data-Driven Decisions</div>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-lift">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Manajemen Peran</h3>
                    <p class="text-gray-600 mb-4">
                        Atur akses tim dengan peran yang berbeda. Super admin untuk pemilik, admin untuk karyawan.
                    </p>
                    <div class="text-indigo-600 font-semibold">→ Kontrol Akses</div>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-lift">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-teal-500 to-green-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 20.944A12.02 12.02 0 0012 21a12.02 12.02 0 008.618-3.04A12.02 12.02 0 0021 8.944c0-1.357-.126-2.68-.359-3.964A11.955 11.955 0 0117.618 4.984z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Keamanan Data</h3>
                    <p class="text-gray-600 mb-4">
                        Data Anda aman dengan enkripsi tingkat tinggi dan backup harian. Fokus pada bisnis, kami yang
                        urus keamanannya.
                    </p>
                    <div class="text-teal-600 font-semibold">→ Enkripsi & Backup</div>
                </div>
            </div>
    </section>

    <!-- Pricing Section -->
    <section id="harga" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6">
                    Harga <span class="gradient-text">Sederhana & Transparan</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Hanya satu paket dengan semua fitur premium. Tidak ada biaya tersembunyi.
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="pricing-card p-12 rounded-3xl bg-white border border-gray-200 shadow-xl relative">
                    <div class="absolute top-0 right-0 bg-yellow-400 text-gray-900 font-bold py-2 px-6 rounded-bl-lg">
                        POPULER
                    </div>

                    <div class="grid lg:grid-cols-2 gap-12">
                        <div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-4">Paket Profesional</h3>
                            <p class="text-gray-600 mb-8">
                                Solusi lengkap untuk mengelola semua aspek bisnis rental Anda.
                            </p>

                            <div class="flex items-baseline mb-8">
                                <span class="text-5xl font-bold gradient-text">Rp99k</span>
                                <span class="text-gray-500 ml-2">/bulan</span>
                            </div>

                            <button class="cta-button w-full text-white py-4 rounded-xl font-bold text-lg"
                                onclick="window.location.href ='/login'">
                                Mulai Sekarang
                            </button>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold text-gray-900 mb-4">Semua Fitur Termasuk:</h4>
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Manajemen Sepeda Tak Terbatas
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Database Customer
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Pencatatan Transaksi
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Integrasi Booking WhatsApp
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Dukungan Prioritas 24/7
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimoni" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6">
                    Dipercaya oleh <span class="gradient-text">Ratusan Pengusaha Rental</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Dengarkan apa yang dikatakan pelanggan kami tentang pengalaman mereka.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <div class="testimonial-card p-8 rounded-2xl border border-gray-200 hover-lift">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            BS
                        </div>
                        <div class="ml-4">
                            <h4 class="text-xl font-bold text-gray-900">Budi Santoso</h4>
                            <p class="text-gray-600">Owner, Bromo Bike Rental</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Sejak pakai SewaSepedaku, pencatatan jadi rapi dan omzet naik 30%! Tidak ada lagi pusing soal
                        stok dan transaksi yang tercecer."
                    </p>
                    <div class="flex">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                </div>

                <div class="testimonial-card p-8 rounded-2xl border border-gray-200 hover-lift">
                    <div class="flex items-center mb-6">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            CL
                        </div>
                        <div class="ml-4">
                            <h4 class="text-xl font-bold text-gray-900">Citra Lestari</h4>
                            <p class="text-gray-600">Manager, Jogja Gowes</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Saya tidak terlalu paham teknologi, tapi aplikasi ini sangat mudah digunakan. Fitur
                        WhatsApp-nya sangat membantu komunikasi dengan pelanggan."
                    </p>
                    <div class="flex">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="cara-kerja" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6">
                    Cara Kerja <span class="gradient-text">Sederhana</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Hanya 4 langkah mudah untuk mengubah bisnis rental sepeda Anda.
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="process-step relative">
                    <div
                        class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center text-white font-bold text-2xl mb-6">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Daftar Akun</h3>
                    <p class="text-gray-600">
                        Buat akun gratis dalam 1 menit. Tidak perlu kartu kredit.
                    </p>
                </div>

                <div class="process-step relative">
                    <div
                        class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center text-white font-bold text-2xl mb-6">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Tambahkan Sepeda</h3>
                    <p class="text-gray-600">
                        Input semua sepeda Anda dengan foto dan detail spesifikasi.
                    </p>
                </div>

                <div class="process-step relative">
                    <div
                        class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center text-white font-bold text-2xl mb-6">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Mulai Sewakan</h3>
                    <p class="text-gray-600">
                        Proses booking dan pembayaran melalui sistem terintegrasi.
                    </p>
                </div>

                <div class="process-step relative">
                    <div
                        class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center text-white font-bold text-2xl mb-6">
                        4
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Analisis & Tingkatkan</h3>
                    <p class="text-gray-600">
                        Pantau kinerja dan optimalkan bisnis dari dashboard analitik.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="gradient-bg py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl lg:text-5xl font-black text-white mb-6">
                Siap Mengubah Cara Anda Berbisnis?
            </h2>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto mb-8">
                Coba semua fitur premium kami gratis selama 14 hari. Tidak perlu kartu kredit.
            </p>
            <button onclick="window.location.href ='/register'"
                class="cta-button text-white px-8 py-4 rounded-xl font-bold text-lg inline-flex items-center justify-center">
                🚀 Daftar & Coba Gratis Sekarang
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                    </path>
                </svg>
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </div>
                        <span class="text-xl font-bold">SewaSepedaku</span>
                    </div>
                    <p class="text-gray-400 mb-6">
                        Platform SaaS all-in-one untuk mengelola bisnis rental sepeda dengan mudah dan efisien.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Perusahaan</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Karir</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Partner</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Sumber Daya</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Dokumentasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Pusat Bantuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Komunitas</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Status</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Kontak</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-gray-400 mr-3 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-gray-400">+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-gray-400 mr-3 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-gray-400">hello@sewasepedaku.com</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-gray-400 mr-3 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-400">Jl. Teknologi No. 123, Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>© 2023 SewaSepedaku. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>