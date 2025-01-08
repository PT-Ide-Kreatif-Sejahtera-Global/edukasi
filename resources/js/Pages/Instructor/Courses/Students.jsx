import Pagination from "@/Components/ui/Pagination";
import InstructorLayout from "@/Layouts/InstructorLayout";
import { ArrowLeftIcon } from "@heroicons/react/24/outline";
import { Head, Link } from "@inertiajs/react";

export default function Students({ students }) {
    const currentPage = students.current_page; // Use students instead of users
    const itemsPerPage = students.per_page;

    return (
        <InstructorLayout title="Kelola Kursus">
            <Head title="Daftar Kursus" />
            <div className="mt-4 mx-5 max-w-6xl rounded-lg bg-white shadow-md">
                <div className="mt-4 px-4 py-4 sm:px-6 lg:px-8 bg-white">
                    <div className="sm:flex sm:items-center">
                        <div className="sm:flex-auto">
                            <h1 className="text-base font-semibold text-gray-900">
                                Total Murid: {students.total}
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
                                                Nama Murid
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/5" // Set equal width
                                            >
                                                Email
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody className="divide-y divide-gray-200">
                                        {students.data.length === 0 ? (
                                            <tr>
                                                <td
                                                    colSpan="5"
                                                    className="py-4 text-center text-sm text-gray-500"
                                                >
                                                    Tidak ada data Murid.
                                                </td>
                                            </tr>
                                        ) : (
                                            students.data.map(
                                                (student, index) => {
                                                    const displayIndex =
                                                        (currentPage - 1) *
                                                            itemsPerPage +
                                                        index +
                                                        1;
                                                    return (
                                                        <tr
                                                            key={student.id}
                                                            className="border-b border-gray-200"
                                                        >
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/5">
                                                                {displayIndex}
                                                            </td>
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/5">
                                                                {student.name}
                                                            </td>
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/5">
                                                                {student.email}
                                                            </td>
                                                        </tr>
                                                    );
                                                }
                                            )
                                        )}
                                    </tbody>
                                </table>
                                <div className="flex justify-start mt-4">
                                    <Link
                                        href={route("students")}
                                        className="text-lime-600 hover:text-lime-900"
                                    >
                                        <ArrowLeftIcon className="h-5 w-5 mr-2" />
                                        Kembali
                                    </Link>
                                </div>
                                <div className="flex pb-5 justify-end mt-4">
                                    <Pagination links={students.links} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </InstructorLayout>
    );
}
