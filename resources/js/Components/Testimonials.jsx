import { TestimonialCard } from "./ui/TestimonialCard";

export default function Testimonials() {
    return (
        <div className="grid grid-rows-2 lg:grid-cols-2 bg-lime-500 my-16 p-10 gap-6">
            <div className=" bg-white shadow sm:rounded-lg h-64 m-auto w-96">
                <div className="px-4 py-5 sm:p-6 items-center">
                    <p className="text-lime-500 text-2xl font-medium">
                        Dipercaya oleh lebih dari 900k pelajar
                    </p>
                    <h3 className="text-lg font-medium text-gray-900">
                        Testimonial
                    </h3>
                    <button>Cek Katalog Kelas</button>
                </div>
            </div>
            <div className="grid grid-cols-2 gap-4 justify-center">
                <TestimonialCard
                    title="Hemat Waktu"
                    description="Materi design & development mudah dipahami, thanks IdeaCourse."
                    userImage="https://via.placeholder.com/72"
                    userName="Evita"
                    userRole="UI/UX Designer"
                />
                <TestimonialCard
                    title="Hemat Waktu"
                    description="Materi design & development mudah dipahami, thanks IdeaCourse."
                    userImage="https://via.placeholder.com/72"
                    userName="Evita"
                    userRole="UI/UX Designer"
                />
                <TestimonialCard
                    title="Hemat Waktu"
                    description="Materi design & development mudah dipahami, thanks IdeaCourse."
                    userImage="https://via.placeholder.com/72"
                    userName="Evita"
                    userRole="UI/UX Designer"
                />
                <TestimonialCard
                    title="Hemat Waktu"
                    description="Materi design & development mudah dipahami, thanks IdeaCourse."
                    userImage="https://via.placeholder.com/72"
                    userName="Evita"
                    userRole="UI/UX Designer"
                />
                <TestimonialCard
                    title="Hemat Waktu"
                    description="Materi design & development mudah dipahami, thanks IdeaCourse."
                    userImage="https://via.placeholder.com/72"
                    userName="Evita"
                    userRole="UI/UX Designer"
                />
                <TestimonialCard
                    title="Hemat Waktu"
                    description="Materi design & development mudah dipahami, thanks IdeaCourse."
                    userImage="https://via.placeholder.com/72"
                    userName="Evita"
                    userRole="UI/UX Designer"
                />
            </div>
        </div>
    );
}
