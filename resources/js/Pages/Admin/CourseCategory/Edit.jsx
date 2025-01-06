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

export default function EditCategory({ category, errors }) {
    const { data, setData, post, processing, recentlySuccessful } = useForm({
        name: category.name || "",
    });

    const [open, setOpen] = useState(false); // Dialog state

    const submit = (e) => {
        e.preventDefault();

        put(route("updatekategori", category.id), {
            preserveScroll: true,
            onSuccess: () => {
                <SuccessDialog
                    isOpen={open}
                    onClose={() => setOpen(false)}
                    title="Berhasil"
                    message="Berhasil Menambahkan Kategori Kursus"
                    buttonText="Tutup"
                />;
                setData({
                    name: "",
                }); // Reset form data
            },
            onError: () => {
                <ErrorDialog
                    isOpen={open}
                    onClose={() => setOpen(false)}
                    title="Error"
                    message="Gagal Menambahkan Kategori Kursus"
                    buttonText="Tutup"
                />;
            },
        });
    };

    return (
        <AdminLayout title="Edit Kategori Kursus">
            <Head title="Edit Kategori Kursus" />
            <div className="mt-4 mx-5 overflow-hidden rounded-lg bg-white shadow-md">
                <div className="my-4 px-4 sm:px-6 lg:px-8 bg-white">
                    <Link
                        href={route("kategori")}
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
                                    htmlFor="name"
                                    value="Kategori Kursus"
                                />
                                <TextInput
                                    id="name"
                                    className="mt-1 block w-full"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData("name", e.target.value)
                                    }
                                    required
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.name}
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
