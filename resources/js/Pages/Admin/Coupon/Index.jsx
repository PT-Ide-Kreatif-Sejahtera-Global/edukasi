import Pagination from "@/Components/ui/Pagination";
import AdminLayout from "@/Layouts/AdminLayout";
import { PencilIcon } from "@heroicons/react/24/outline";
import { TrashIcon } from "@heroicons/react/24/outline";
import { Head, Link } from "@inertiajs/react";

export default function CouponIndex({ coupons }) {
    const currentPage = coupons.current_page || 1; // Default to 1 if current_page is undefined
    const itemsPerPage = coupons.per_page || 10; // Default to 10 if per_page is undefined

    const formatDate = (dateString) => {
        const options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
        };
        const date = new Date(dateString);
        return new Intl.DateTimeFormat("id-ID", options).format(date);
    };

    return (
        <AdminLayout title="Kupon">
            <Head title="Daftar Kupon" />
            <div className="mt-4 mx-5 overflow-hidden rounded-lg bg-white shadow-md">
                <div className="mt-4 px-4 sm:px-6 lg:px-8 bg-white">
                    <div className="sm:flex sm:items-center">
                        <div className="sm:flex-auto">
                            <h1 className="text-base font-semibold text-gray-900">
                                Total Kupon: {coupons.total}
                            </h1>
                        </div>
                        <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <Link
                                type="button"
                                href={route("tambahcoupon")}
                                className="block rounded-md bg-lime-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                                Tambah Kupon
                            </Link>
                        </div>
                    </div>
                    <div className="mt-8 flow-root">
                        <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div className="inline-block w-full max-h-96 overflow-y-auto py-2 mb-5 align-middle sm:px-6 lg:px-8">
                                <table className="w-full divide-y divide-gray-300 border border-gray-300">
                                    <thead>
                                        <tr className="bg-gray-50">
                                            <th
                                                scope="col"
                                                className="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-0 border-b border-gray-300 w-1/10"
                                            >
                                                No
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Kode Kupon
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Deskripsi
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Tipe Diskon
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Nilai Diskon
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Berlaku Dari
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Berlaku Sampai
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Batas Penggunaan
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Total Penggunaan
                                            </th>
                                            <th
                                                scope="col"
                                                className="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 border-b border-gray-300 w-1/10"
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody className="divide-y divide-gray-200">
                                        {coupons.data &&
                                        coupons.data.length > 0 ? (
                                            coupons.data.map(
                                                (couponItem, index) => {
                                                    const displayIndex =
                                                        (currentPage - 1) *
                                                            itemsPerPage +
                                                        index +
                                                        1; // Calculate the display index
                                                    return (
                                                        <tr
                                                            key={couponItem.id} // Use a unique identifier
                                                            className="border-b border-gray-200"
                                                        >
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/10">
                                                                {displayIndex}
                                                            </td>
                                                            <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0 border-b border-gray-300 text-center w-1/10">
                                                                {
                                                                    couponItem.cupon_code
                                                                }
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/10">
                                                                {
                                                                    couponItem.description
                                                                }
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/10">
                                                                {couponItem.discount_type ===
                                                                "percentage"
                                                                    ? "Persen"
                                                                    : "Potongan harga"}
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/10">
                                                                {`${couponItem.discount_value}%`}
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/10">
                                                                {formatDate(
                                                                    couponItem.valid_form
                                                                )}
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/10">
                                                                {formatDate(
                                                                    couponItem.valid_until
                                                                )}
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/10">
                                                                {
                                                                    couponItem.usage_limit
                                                                }
                                                            </td>
                                                            <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500 border-b border-gray-300 text-center w-1/10">
                                                                {
                                                                    couponItem.total_usage
                                                                }
                                                            </td>
                                                            <td className="flex whitespace-nowrap align-middle justify-center items-center pt-4 pl-3 pr-4 text-sm font-medium sm:pr-0 border-gray-300 w-1/10">
                                                                <Link
                                                                    href={route(
                                                                        "editcoupon",
                                                                        couponItem.id
                                                                    )}
                                                                    className="text-indigo-600 hover:text-indigo-900"
                                                                >
                                                                    <PencilIcon className="h-5 w-5 mr-2" />
                                                                </Link>
                                                                <Link
                                                                    href={route(
                                                                        "deletecoupon",
                                                                        couponItem.id
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
                                        ) : (
                                            <tr>
                                                <td
                                                    colSpan="10"
                                                    className="py-4 text-center text-sm text-gray-500"
                                                >
                                                    Tidak ada data Kupon.
                                                </td>
                                            </tr>
                                        )}
                                    </tbody>
                                </table>
                                <div className="flex justify-end mt-4">
                                    <Pagination links={coupons.links} />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
