import Pagination from "@/Components/ui/Pagination";
import AdminLayout from "@/Layouts/AdminLayout";
import { PencilIcon } from "@heroicons/react/24/outline";
import { TrashIcon } from "@heroicons/react/24/outline";
import { Head, Link } from "@inertiajs/react";

export default function ManageAdminIndex({ admins }) {
    const currentPage = admins.current_page;
    const itemsPerPage = admins.per_page;

    return (
        <AdminLayout title="Manajemen Admin">
            <Head title="Daftar Admin" />
            <div className="mt-4 mx-5 overflow-hidden rounded-lg bg-white shadow-md">
                <div className="mt-4 px-4 sm:px-6 lg:px-8 bg-white">
                    <div className="sm:flex sm:items-center">
                        <div className="sm:flex-auto">
                            <h1 className="text-base font-semibold text-gray-900">
                                Total Admin: {admins.total}
                            </h1>
                        </div>
                        <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <Link
                                type="button"
                                href={route("tambahadmin")}
                                className="block rounded-md bg-lime-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600"
                            >
                                Tambah Admin
                            </Link>
                        </div>
                    </div>
                    <div className="mt-8 flow-root">
                        <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div className="inline-block min-w-full max-h-60 overflow-y-auto py-2 mb-5 align-middle sm:px-6 lg:px-8">
                                <table className="min-w-full divide-y divide-gray-300 border border-gray-300">
                                    <thead>
                                        <tr className="bg-gray-50">
                                            <th
                                                scope="col"
                                                className="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-0 border-b border-gray-300"
                                            >
                                                No
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300"
                                            >
                                                Nama
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300"
                                            >
                                                Email
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300"
                                            >
                                                Foto
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300"
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody className="divide-y divide-gray-200">
                                        {admins.data.length === 0 ? (
                                            <tr>
                                                <td
                                                    colSpan="6"
                                                    className="py-4 text-center text-sm text-gray-500"
                                                >
                                                    Tidak ada data Admin.
                                                </td>
                                            </tr>
                                        ) : (
                                            admins.data.map((person, index) => {
                                                const displayIndex =
                                                    (currentPage - 1) *
                                                        itemsPerPage +
                                                    index +
                                                    1;
                                                return (
                                                    <tr
                                                        key={person.email}
                                                        className="border-b border-gray-200"
                                                    >
                                                        <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center">
                                                            {displayIndex}
                                                        </td>
                                                        <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center">
                                                            {person.name}
                                                        </td>
                                                        <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center">
                                                            {person.email}
                                                        </td>
                                                        <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center">
                                                            <img
                                                                src={`/storage/users/${person.foto}`}
                                                                alt="Foto"
                                                                className="w-16 h-16 mx-auto" // Center the image
                                                            />
                                                        </td>
                                                        <td className="flex whitespace-nowrap align-middle justify-center items-center pt-4 pl-3 pr-4 text-sm font-medium sm:pr-0 border-gray-300">
                                                            <Link
                                                                href={route(
                                                                    "editadmin",
                                                                    person.id
                                                                )}
                                                                className="text-indigo-600 hover:text-indigo-900"
                                                            >
                                                                <PencilIcon className="h-5 w-5 mr-2" />
                                                            </Link>
                                                            <Link
                                                                href={route(
                                                                    "deleteadmin",
                                                                    person.id
                                                                )}
                                                                className="text-red-600 hover:text-red-900"
                                                            >
                                                                <TrashIcon className="h-5 w-5 mr-2" />
                                                            </Link>
                                                        </td>
                                                    </tr>
                                                );
                                            })
                                        )}
                                    </tbody>
                                </table>
                                <div className="flex justify-end mt-4">
                                    <Pagination links={admins.links} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
