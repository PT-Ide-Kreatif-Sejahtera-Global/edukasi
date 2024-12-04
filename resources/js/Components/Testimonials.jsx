import { TestimonialCard } from "./ui/TestimonialCard";

export default function Testimonials() {
    return (
        <div className="grid grid-cols-1 sm:grid-cols-5 bg-lime-500 mt-16 md:mt-32 p-10 gap-6">
            <div className="row-span-2 sm:col-span-2 bg-white shadow-md rounded-lg h-auto m-auto w-full">
                <div className="px-4 py-5 sm:p-6 items-center">
                    <p className="text-lime-500 text-md font-medium">
                        Dipercaya oleh lebih dari 900k pelajar
                    </p>
                    <h3 className="text-3xl font-bold text-gray-900 my-2">
                        Mari bergabung dengan kami dan rasakan manfaatnya
                    </h3>
                    <button className="text-white flex items-center text-sm font-medium py-2 px-4 rounded-lg bg-lime-500 hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2">
                        Cek Kelas
                    </button>
                </div>
            </div>
            <div className="col-span-1 sm:col-span-3 grid grid-cols-2 gap-4">
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
