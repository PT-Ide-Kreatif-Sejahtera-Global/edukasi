import Pagination from "@/Components/ui/Pagination";
import AdminLayout from "@/Layouts/AdminLayout";
import { PencilIcon } from "@heroicons/react/24/outline";
import { TrashIcon } from "@heroicons/react/24/outline";
import { Head, Link } from "@inertiajs/react";

export default function CourseContentIndex({ coursecontents }) {
    const currentPage = coursecontents.current_page;
    const itemsPerPage = coursecontents.per_page;

    return (
        <AdminLayout title="Konten Kursus">
            <Head title="Daftar Konten Kursus" />
            <div className="mt-4 mx-5 max-w-6xl rounded-lg bg-white shadow-md">
                <div className="mt-4 px-4 py-4 sm:px-6 lg:px-8 bg-white">
                    <div className="sm:flex sm:items-center">
                        <div className="sm:flex-auto">
                            <h1 className="text-base font-semibold text-gray-900">
                                Total Konten Kursus: {coursecontents.total}
                            </h1>
                        </div>
                        <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <Link
                                type="button"
                                href={route("tambahcontent")}
                                className="block rounded-md bg-lime-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600"
                            >
                                Tambah Konten Kursus
                            </Link>
                        </div>
                    </div>
                    <div className="mt-8 flow-root">
                        <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div className="inline-block min-w-full max-h-96 py-2 mb-5 align-middle sm:px-6 lg:px-8">
                                <table className="min-w-full divide-y divide-gray-300 border border-gray-300">
                                    <thead>
                                        <tr className="bg-gray-50">
                                            <th
                                                scope="col"
                                                className="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-0 border-b border-gray-300 w-1/12"
                                            >
                                                No
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/6"
                                            >
                                                Judul Kursus
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/6"
                                            >
                                                Kategori
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/6"
                                            >
                                                Section
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/6"
                                            >
                                                Judul Konten
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/6"
                                            >
                                                URL
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/12"
                                            >
                                                Durasi
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/12"
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody className="divide-y divide-gray-200">
                                        {coursecontents.data.length === 0 ? (
                                            <tr>
                                                <td
                                                    colSpan="8"
                                                    className="py-4 text-center text-sm text-gray-500"
                                                >
                                                    Tidak ada data kursus
                                                    konten.
                                                </td>
                                            </tr>
                                        ) : (
                                            coursecontents.data.map(
                                                (content, index) => {
                                                    const displayIndex =
                                                        (currentPage - 1) *
                                                            itemsPerPage +
                                                        index +
                                                        1;
                                                    return (
                                                        <tr
                                                            key={content.id}
                                                            className="border-b border-gray-200"
                                                        >
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/12">
                                                                {displayIndex}
                                                            </td>
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/6">
                                                                <p className="text-sm text-gray-500 text-wrap break-words">
                                                                    {
                                                                        content.course_title
                                                                    }
                                                                </p>
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/6">
                                                                {
                                                                    content.category_name
                                                                }
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/6">
                                                                {
                                                                    content.section
                                                                }
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/6">
                                                                <p className="text-sm text-gray-500 text-wrap break-words">
                                                                    {
                                                                        content.title
                                                                    }
                                                                </p>
                                                            </td>
                                                            <td className="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/6">
                                                                <p className="text-sm text-gray-500 text-wrap break-words overflow-hidden overflow-ellipsis whitespace-normal">
                                                                    {
                                                                        content.url
                                                                    }
                                                                </p>
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/12">
                                                                {
                                                                    content.duration
                                                                }
                                                            </td>
                                                            <td className="flex justify-center items-center pt-4 pl-3 pr-4 text-sm font-medium sm:pr-0 border-gray-300 w-1/12">
                                                                <Link
                                                                    href={route(
                                                                        "editcontent",
                                                                        content.id
                                                                    )}
                                                                    className="text-indigo-600 hover:text-indigo-900"
                                                                >
                                                                    <PencilIcon className="h-5 w-5 mr-2" />
                                                                </Link>
                                                                <Link
                                                                    href={route(
                                                                        "deletecontent",
                                                                        content.id
                                                                    )}
                                                                    className="text-red-600 hover:text-red-900"
                                                                >
                                                                    <TrashIcon className="h-5 w-5 mr-2" />
                                                                </Link>
                                                            </td>
                                                        </tr>
                                                    );
                                                }
                                            )
                                        )}
                                    </tbody>
                                </table>
                                <div className="flex justify-end mt-4">
                                    <Pagination links={coursecontents.links} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
