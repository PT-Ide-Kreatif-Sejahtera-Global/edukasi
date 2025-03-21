import { useEffect, useState } from "react";

const HeroSection = () => {
    const [currentSlide, setCurrentSlide] = useState(0);
    const slides = [
        {
            image: "/landing/images/slider-image1.jpg",
            title: "Ingin Mengembangkan Diri?",
            text: "Kami memiliki banyak kursus yang dapat membantu anda berkembang",
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
        <>
            <section className="relative">
                <div className="relative w-full h-[500px] overflow-hidden">
                    <img
                        src={slides[currentSlide].image}
                        alt={`Slide ${currentSlide + 1}`}
                        className="w-full h-full object-cover"
                    />
                </div>

                {/* Content for Desktop */}
                <div className="hidden lg:block absolute w-96 top-1/2 left-1/4 transform -translate-x-1/2 -translate-y-1/2 p-8 bg-white rounded-lg shadow-lg">
                    <h2 className="text-xl font-bold mb-4 text-center">
                        {slides[currentSlide].title}
                    </h2>
                    <p className="text-md mb-6 text-left">
                        {slides[currentSlide].text}
                    </p>
                    <button className="bg-lime-500 hover:bg-lime-700 text-white font-bold py-2 px-6 rounded">
                        Mulai Belajar
                    </button>
                </div>

                <div className="absolute top-1/2 left-4 transform -translate-y-1/2">
                    <button
                        onClick={handlePrev}
                        className="text-white text-4xl"
                    >
                        &#8249;
                    </button>
                </div>
                <div className="absolute top-1/2 right-4 transform -translate-y-1/2">
                    <button
                        onClick={handleNext}
                        className="text-white text-4xl"
                    >
                        &#8250;
                    </button>
                </div>
            </section>
            <div className="block lg:hidden w-full mt-12">
                <h2 className="text-lg font-bold mb-2 text-center">
                    {slides[currentSlide].title}
                </h2>
                <p className="text-sm mb-4 text-center">
                    {slides[currentSlide].text}
                </p>
            </div>
        </>
    );
};

export default HeroSection;
