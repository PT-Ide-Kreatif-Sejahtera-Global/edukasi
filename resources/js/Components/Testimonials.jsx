import { TestimonialCard } from "./ui/TestimonialCard";

export default function Testimonials() {
    return (
        <div className="bg-lime-500 my-16 py-10">
            <h2 className="text-center text-white text-5xl lg:mb-16 font-semibold mb-6">
                Dipercaya lebih dari 900k pelajar
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
            <button
                type="button"
                className="rounded-full bg-lime-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600"
            >
                Button text
            </button>
        </div>
    );
}
