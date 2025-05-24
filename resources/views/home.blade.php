@extends('layouts.app')

@section('title', 'Home - Portfolio Website')

@section('content')
    <!-- Hero Section -->
    <section class="bg-indigo-700 text-white">
        <div class="container mx-auto px-4 py-20">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $about->name ?? 'Your Name' }}</h1>
                    <p class="text-xl mb-6">{{ Str::limit($about->description ?? 'Professional description here...', 150) }}</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('about.index') }}" class="px-6 py-3 bg-white text-indigo-700 font-semibold rounded-lg hover:bg-gray-100 transition">Learn More</a>
                        <a href="{{ route('contact.index') }}" class="px-6 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-indigo-700 transition">Contact Me</a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    @if(isset($about) && $about->profile_image)
                        <img src="data:{{ $about->profile_image_type }};base64,{{ base64_encode($about->profile_image) }}" alt="{{ $about->name }}" class="rounded-full w-64 h-64 object-cover border-4 border-white shadow-lg">
                    @else
                        <div class="rounded-full w-64 h-64 bg-indigo-600 flex items-center justify-center border-4 border-white shadow-lg">
                            <i class="fas fa-user text-6xl"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Preview Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Featured Work</h2>
            
            @if(isset($portfolio) && count($portfolio) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolio->take(3) as $item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $item->name }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($item->description, 100) }}</p>
                                <a href="{{ route('portfolio.show', $item->id) }}" class="text-indigo-600 font-medium hover:text-indigo-800">View Details &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-600">No portfolio items available yet.</p>
                </div>
            @endif
            
            <div class="text-center mt-10">
                <a href="{{ route('portfolio.index') }}" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">View All Work</a>
            </div>
        </div>
    </section>

    <!-- Certificates Preview Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Certifications & Qualifications</h2>
            
            @if(isset($certificates) && count($certificates) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($certificates->take(4) as $certificate)
                        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition">
                            <div class="text-indigo-600 mb-4">
                                <i class="fas fa-certificate text-3xl"></i>
                            </div>
                            <h3 class="text-lg font-bold mb-2">{{ $certificate->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($certificate->description, 80) }}</p>
                            <a href="{{ route('certificate.show', $certificate->id) }}" class="text-indigo-600 text-sm font-medium hover:text-indigo-800">View Certificate &rarr;</a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-600">No certificates available yet.</p>
                </div>
            @endif
            
            <div class="text-center mt-10">
                <a href="{{ route('certificate.index') }}" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">View All Certificates</a>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section class="py-16 bg-indigo-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Let's Work Together</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Interested in collaborating or have a project in mind? Get in touch and let's create something amazing.</p>
            <a href="{{ route('contact.index') }}" class="px-8 py-4 bg-white text-indigo-600 font-bold rounded-lg hover:bg-gray-100 transition">Contact Me</a>
        </div>
    </section>
@endsection