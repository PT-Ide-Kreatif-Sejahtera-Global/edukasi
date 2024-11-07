const Testimonials = () => {
    const students = [
        {
            name: "Student Name 1",
            testimonial:
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            rating: 1.5,
        },
        {
            name: "Student Name 2",
            testimonial:
                "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            rating: 5,
        },
        {
            name: "Student Name 3",
            testimonial:
                "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
            rating: 5,
        },
    ];

    const renderStars = (rating) => {
        const fullStars = Math.floor(rating);
        const halfStar = rating % 1 >= 0.5 ? 1 : 0;
        const emptyStars = 5 - fullStars - halfStar;

        return (
            <span className="text-yellow-500 text-2xl">
                {"⭐".repeat(fullStars)} {/* Filled stars */}
                {halfStar ? "⭐" : ""} {/* Half star */}
            </span>
        );
    };

    return (
        <div className="bg-lime-500 my-32 py-10">
            <h2 className="text-center text-white text-5xl lg:mb-16 font-semibold mb-6">
                Trusted By 1000++ Students
            </h2>
            <div className="flex justify-center space-x-4">
                {students.map((student, index) => (
                    <div
                        key={index}
                        className="bg-white shadow-lg p-5 rounded-lg max-w-xs"
                    >
                        <div className="flex items-center mb-4">
                            <span className="text-yellow-500 text-2xl">
                                {renderStars(student.rating)}
                            </span>
                        </div>
                        <h3 className="text-lg font-bold">{student.name}</h3>
                        <p className="text-gray-600 mt-2">
                            {student.testimonial}
                        </p>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default Testimonials;
