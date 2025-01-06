import Pagination from "@/Components/ui/Pagination";
import InstructorLayout from "@/Layouts/InstructorLayout";
import { PencilIcon } from "@heroicons/react/24/outline";
import { Head, Link } from "@inertiajs/react";

export default function MyCourse({ enrollments }) {
    const currentPage = enrollments.current_page; // Use enrollments instead of users
    const itemsPerPage = enrollments.per_page;

    return (
        <InstructorLayout title="Kelola Kursus">
            <Head title="Daftar Kursus" />
            <div className="mt-4 mx-5 max-w-6xl rounded-lg bg-white shadow-md">
                <div className="mt-4 px-4 py-4 sm:px-6 lg:px-8 bg-white">
                    <div className="sm:flex sm:items-center">
                        <div className="sm:flex-auto">
                            <h1 className="text-base font-semibold text-gray-900">
                                Total Kursus Yang Diajar: {enrollments.total}
                            </h1>
                        </div>
                        {/* <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <Link
                                type="button"
                                href={route("tambahcourse")}
                                className="block rounded-md bg-lime-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600"
                            >
                                Tambah Kursus
                            </Link>
                        </div> */}
                    </div>
                    <div className="mt-8 flow-root">
                        <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div className="inline-block min-w-full max-h-96 py-2 mb-5 align-middle sm:px-6 lg:px-8">
                                <table className="min-w-full divide-y divide-gray-300 border border-gray-300">
                                    <thead>
                                        <tr className="bg-gray-50">
                                            <th
                                                scope="col"
                                                className="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-0 border-b border-gray-300 w-1/5" // Set equal width
                                            >
                                                No
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/5" // Set equal width
                                            >
                                                Judul Kursus
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/5" // Set equal width
                                            >
                                                Nama Instruktur
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/5" // Set equal width
                                            >
                                                Total Siswa
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/5" // Set equal width
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody className="divide-y divide-gray-200">
                                        {enrollments.data.length === 0 ? (
                                            <tr>
                                                <td
                                                    colSpan="5"
                                                    className="py-4 text-center text-sm text-gray-500"
                                                >
                                                    Tidak ada data kursus yang
                                                    diambil.
                                                </td>
                                            </tr>
                                        ) : (
                                            enrollments.data.map(
                                                (enrollment, index) => {
                                                    const displayIndex =
                                                        (currentPage - 1) *
                                                            itemsPerPage +
                                                        index +
                                                        1;
                                                    return (
                                                        <tr
                                                            key={
                                                                enrollment.course_id
                                                            }
                                                            className="border-b border-gray-200"
                                                        >
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/5">
                                                                {displayIndex}
                                                            </td>
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/5">
                                                                {
                                                                    enrollment.course_title
                                                                }
                                                            </td>
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/5">
                                                                {
                                                                    enrollment.instructor_name
                                                                }
                                                            </td>
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/5">
                                                                <p className="text-sm text-gray-500">
                                                                    {
                                                                        enrollment.total_students
                                                                    }
                                                                </p>
                                                            </td>
                                                            <td className="flex whitespace-nowrap align-middle justify-center items-center pt-4 pl-3 pr-4 text-sm font-medium sm:pr-0 border-gray-300 w-1/5">
                                                                <Link
                                                                    href={route(
                                                                        "students",
                                                                        enrollment.course_id
                                                                    )}
                                                                    className="text-indigo-600 hover:text-indigo-900"
                                                                >
                                                                    <PencilIcon className="h-5 w-5 mr-2" />
                                                                </Link>
                                                            </td>
                                                        </tr>
                                                    );
                                                }
                                            )
                                        )}
                                    </tbody>
                                </table>
                                <div className="flex pb-5 justify-end mt-4">
                                    <Pagination links={enrollments.links} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </InstructorLayout>
    );
}
