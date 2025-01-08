import CourseList from "@/Components/CourseList";
import FAQList from "@/Components/FAQList";
import HeroSection from "@/Components/HeroSection";
import InstructorList from "@/Components/InstructorList";
import Testimonials from "@/Components/Testimonials";
import ChatComponent from "@/Components/ui/ChatComponent";
import UserLayout from "@/Layouts/UserLayout";
import { Head } from "@inertiajs/react";

const purchasedCourses = [
    {
        id: 1,
        title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta Pertama",
        price: 200000,
        image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
    },
];

export default function Welcome({ auth, courses, instructors }) {
    return (
        <UserLayout purchasedCourses={purchasedCourses} auth={auth}>
            <Head title="Welcome" />
            <HeroSection />
            {/* <Testimonials /> */}
            <InstructorList instructors={instructors} />
            <CourseList courses={courses} />
            <ChatComponent />
        </UserLayout>
    );
}
