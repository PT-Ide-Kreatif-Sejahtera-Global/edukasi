import InstructorCard from "@/Components/ui/InstructorCard";
import Pagination from "@/Components/ui/Pagination";
import UserLayout from "@/Layouts/UserLayout";
import { Head } from "@inertiajs/react";

export default function Instructor({ auth, instructors }) {
    return (
        <UserLayout auth={auth}>
            <Head title="Daftar Instruktur" />
            <div className="pt-10 pb-10 max-w-6xl mx-auto">
                <h1 className="text-center text-3xl font-bold mb-4">
                    Daftar Instuktur
                </h1>
                <div className="grid grid-flow-col scrollbar-hidden overflow-auto gap-6">
                    {instructors.data.map((instructor, index) => (
                        <InstructorCard
                            key={index}
                            name={instructor.name}
                            bio={instructor.bio}
                            image={`/storage/users/${instructor.foto}`} // Adjust the image path as necessary
                        />
                    ))}
                </div>
                <Pagination links={instructors.links} />
            </div>
        </UserLayout>
    );
}
