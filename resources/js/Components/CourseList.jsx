import CourseCard from "./ui/CourseCard";

const CourseList = () => {
    // Sample data for courses
    const courses = [
        {
            title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta",
            description:
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            totalRating: 4.5,
            price: 200000,
            image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta",
            description:
                "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            totalRating: 5.0,
            price: 200000,
            image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta",
            description:
                "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.",
            totalRating: 3.5,
            price: 200000,
            image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta",
            description:
                "Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse.",
            totalRating: 4.0,
            price: 200000,
            image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
    ];

    return (
        <div className="p-10 mb-12">
            <h2 className="text-left text-2xl font-semibold mb-6">
                Pilihan Kursus Yang Banyak
            </h2>
            <p className="text-left text-gray-700 mb-6">
                Kami Menyediakan Ribuan Kursus Yang Dapat Menunjang Kemandirian
                Anda
            </p>
            <div className="grid grid-cols-4 gap-6 overflow-x-auto">
                {courses.map((course, index) => (
                    <CourseCard
                        key={index}
                        title={course.title}
                        price={course.price}
                        ratings={course.ratings}
                        image={course.image}
                    />
                ))}
            </div>
        </div>
    );
};

export default CourseList;
