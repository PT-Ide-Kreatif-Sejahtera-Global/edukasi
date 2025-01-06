import { useState } from "react";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import ReusableDialog from "@/Components/SuccessDialog";
import TextArea from "@/Components/TextArea";
import TextInput from "@/Components/TextInput";
import AdminLayout from "@/Layouts/AdminLayout";
import { Transition } from "@headlessui/react";
import { ArrowLeftIcon } from "@heroicons/react/20/solid";
import { Head, Link, useForm } from "@inertiajs/react";
import SuccessDialog from "@/Components/SuccessDialog";

export default function CreateCoupon({ errors }) {
    const { data, setData, post, processing, recentlySuccessful } = useForm({
        cupon_code: "",
        description: "",
        discount_type: "percentage", // Default value
        discount_value: "",
        valid_form: "",
        valid_until: "",
        usage_limit: "",
    });

    const [open, setOpen] = useState(false); // Dialog state
    const today = new Date().toISOString().split("T")[0];

    const submit = (e) => {
        e.preventDefault();

        post(route("submitcoupon"), {
            preserveScroll: true,
            onSuccess: () => {
                <SuccessDialog
                    isOpen={open}
                    onClose={() => setOpen(false)}
                    title="Berhasil"
                    message="Kupon berhasil ditambahkan"
                    buttonText="Tutup"
                />;
                setData({
                    cupon_code: "",
                    description: "",
                    discount_type: "percentage",
                    discount_value: "",
                    valid_form: "",
                    valid_until: "",
                    usage_limit: "",
                    total_usage: "",
                }); // Reset form data
            },
            onError: () => {
                <ErrorDialog
                    isOpen={open}
                    onClose={() => setOpen(false)}
                    title="Error"
                    message="Kupon Gagal Ditambahkan"
                    buttonText="Tutup"
                />;
            },
        });
    };

    return (
        <AdminLayout title="Tambah Kupon">
            <Head title="Tambah Kupon" />
            <div className="mt-4 mx-5 overflow-hidden rounded-lg bg-white shadow-md">
                <div className="my-4 px-4 sm:px-6 lg:px-8 bg-white">
                    <Link
                        href={route("coupon")}
                        className="flex items-center text-lime-500 hover:text-lime-700"
                    >
                        <ArrowLeftIcon className="h-5 w-5 mr-2" />
                        <p>Kembali</p>
                    </Link>
                    <div className="overflow-y-scroll mt-6 mb-12 px-2 max-h-[360px]">
                        <form
                            onSubmit={submit}
                            encType="multipart/form-data"
                            className="space-y-6"
                        >
                            <div>
                                <InputLabel
                                    htmlFor="cupon_code"
                                    value="Kode Kupon"
                                />
                                <TextInput
                                    id="cupon_code"
                                    className="mt-1 block w-full"
                                    value={data.cupon_code}
                                    onChange={(e) =>
                                        setData("cupon_code", e.target.value)
                                    }
                                    required
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.cupon_code}
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="description"
                                    value="Deskripsi"
                                />
                                <TextArea
                                    id="description"
                                    value={data.description}
                                    onChange={(e) =>
                                        setData("description", e.target.value)
                                    }
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.description}
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="discount_type"
                                    value="Tipe Diskon"
                                />
                                <select
                                    id="discount_type"
                                    name="discount_type"
                                    value={data.discount_type}
                                    onChange={(e) =>
                                        setData("discount_type", e.target.value)
                                    }
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-lime-500 focus:ring-lime-500"
                                    required
                                >
                                    <option value="percentage">
                                        Persentase
                                    </option>
                                    <option value="flat">Nominal</option>
                                </select>
                                <InputError
                                    className="mt-2"
                                    message={errors.discount_type}
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="discount_value"
                                    value="Nilai Diskon"
                                />
                                <TextInput
                                    id="discount_value"
                                    type="number"
                                    className="mt-1 block w-full"
                                    value={data.discount_value}
                                    onChange={(e) =>
                                        setData(
                                            "discount_value",
                                            e.target.value
                                        )
                                    }
                                    required
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.discount_value}
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="valid_form"
                                    value="Tanggal Mulai Berlaku"
                                />
                                <TextInput
                                    id="valid_form"
                                    type="date"
                                    className="mt-1 block w-full"
                                    value={data.valid_form}
                                    onChange={(e) =>
                                        setData("valid_form", e.target.value)
                                    }
                                    required
                                    min={today}
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.valid_form}
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="valid_until"
                                    value="Tanggal Berakhir"
                                />
                                <TextInput
                                    id="valid_until"
                                    type="date"
                                    className="mt-1 block w-full"
                                    value={data.valid_until}
                                    onChange={(e) =>
                                        setData("valid_until", e.target.value)
                                    }
                                    required
                                    min={data.valid_form}
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.valid_until}
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="usage_limit"
                                    value="Batas Penggunaan"
                                />
                                <TextInput
                                    id="usage_limit"
                                    type="number"
                                    className="mt-1 block w-full"
                                    value={data.usage_limit}
                                    onChange={(e) =>
                                        setData("usage_limit", e.target.value)
                                    }
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.usage_limit}
                                />
                            </div>

                            <div className="flex items-center gap-4">
                                <PrimaryButton
                                    className="mb-4"
                                    disabled={processing}
                                >
                                    Simpan
                                </PrimaryButton>

                                <Transition
                                    show={recentlySuccessful}
                                    enter="transition ease-in-out"
                                    enterFrom="opacity-0"
                                    leave="transition ease-in-out"
                                    leaveTo="opacity-0"
                                >
                                    <p className="text-sm text-gray-600">
                                        Tersimpan
                                    </p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
