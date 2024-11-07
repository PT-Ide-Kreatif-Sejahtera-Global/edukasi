import React, { useEffect, useState } from "react";

const HeroSection = () => {
    const [currentSlide, setCurrentSlide] = useState(0);
    const slides = [
        {
            image: "/landing/images/slider-image1.jpg",
            title: "Ingin Mengembangkan Diri?",
            text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        },
        // Add more slides here...
    ];

    useEffect(() => {
        const intervalId = setInterval(() => {
            setCurrentSlide((prev) =>
                prev === slides.length - 1 ? 0 : prev + 1
            );
        }, 5000); // Change 5000 (milliseconds) to adjust the slide interval

        return () => clearInterval(intervalId); // Cleanup on unmount
    }, [slides]);

    const handlePrev = () => {
        setCurrentSlide((prev) => (prev === 0 ? slides.length - 1 : prev - 1));
    };

    const handleNext = () => {
        setCurrentSlide((prev) => (prev === slides.length - 1 ? 0 : prev + 1));
    };

    return (
        <section className="relative">
            <div className="relative w-full h-[500px] overflow-hidden">
                <img
                    src={slides[currentSlide].image}
                    alt={`Slide ${currentSlide + 1}`}
                    className="w-full h-full object-cover"
                />
            </div>

            <div className="hidden lg:block absolute w-96 top-1/2 left-1/4 transform -translate-x-1/2 -translate-y-1/2 text-center p-8 bg-white rounded-lg shadow-lg">
                <h2 className="text-xl font-bold mb-4">
                    {slides[currentSlide].title}
                </h2>
                <p className="text-md mb-6">{slides[currentSlide].text}</p>
                <button className="bg-lime-500 hover:bg-lime-700 text-white font-bold py-2 px-6 rounded">
                    Mulai Belajar
                </button>
            </div>

            <div className="absolute top-1/2 left-4 transform -translate-y-1/2">
                <button onClick={handlePrev} className="text-white text-4xl">
                    &#8249;
                </button>
            </div>
            <div className="absolute top-1/2 right-4 transform -translate-y-1/2">
                <button onClick={handleNext} className="text-white text-4xl">
                    &#8250;
                </button>
            </div>
        </section>
    );
};

export default HeroSection;
