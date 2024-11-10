import { TestimonialCard } from "./ui/TestimonialCard";

export default function Testimonials() {
    return (
        <div className="bg-lime-500 my-16 py-10">
            <h2 className="text-center text-white text-5xl lg:mb-16 font-semibold mb-6">
                Trusted By 1000++ Students
            </h2>
            <div className="flex justify-center space-x-4">
                <TestimonialCard
                    title="Hemat Waktu"
                    description="Materi design & development mudah dipahami, thanks BuildWithAngga."
                    userImage="https://via.placeholder.com/72" // Replace with the actual user image URL
                    userName="Evita"
                    userRole="UI/UX Designer"
                />
            </div>
        </div>
    );
}
