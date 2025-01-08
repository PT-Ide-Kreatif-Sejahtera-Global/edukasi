import { useState } from "react";
import Logo from "@/Components/ui/Logo";
import { Disclosure } from "@headlessui/react";
import { ChevronRightIcon } from "@heroicons/react/20/solid";
import {
    BanknotesIcon,
    BookOpenIcon,
    HomeIcon,
    StarIcon,
    TicketIcon,
    UsersIcon,
} from "@heroicons/react/24/outline";

const navigation = [
    { name: "Dashboard", href: "#", icon: HomeIcon },
    {
        name: "Data Pengguna",
        icon: UsersIcon,
        children: [
            { name: "Daftar Admin", href: "#" },
            { name: "Daftar Instruktur", href: route("instructor") },
            { name: "Daftar User", href: "#" },
        ],
    },
    {
        name: "Data Kursus",
        icon: BookOpenIcon,
        children: [
            { name: "Daftar Kursus", href: "#" },
            { name: "Daftar Konten Kursus", href: "#" },
            { name: "Daftar Kategori Kursus", href: "#" },
            { name: "Daftar Section Kursus", href: "#" },
        ],
    },
    { name: "Pembayaran", href: "#", icon: BanknotesIcon },
    { name: "Rating / Ulasan", href: "#", icon: StarIcon },
    { name: "Kupon", href: route("coupon"), icon: TicketIcon },
];

function classNames(...classes) {
    return classes.filter(Boolean).join(" ");
}

export default function AdminLayout({ children, auth, title }) {
    const [activeMenu, setActiveMenu] = useState("Dashboard"); // Default active menu
    const [openDisclosure, setOpenDisclosure] = useState(null);

    const handleMenuClick = (name) => {
        setActiveMenu(name);
    };

    return (
        <div className="flex bg-gray-50">
            <aside className="w-64 bg-white border-r border-gray-200">
                <div className="mx-auto flex mt-4 items-center justify-center bg-white">
                    <Logo />
                </div>
                <nav className="flex-1 overflow-y-auto">
                    <ul role="list" className="flex flex-col gap-y-2 p-4">
                        {navigation.map((item) => (
                            <li key={item.name}>
                                {!item.children ? (
                                    <a
                                        href={item.href}
                                        onClick={() =>
                                            handleMenuClick(item.name)
                                        }
                                        className={classNames(
                                            activeMenu === item.name
                                                ? "bg-lime-500 text-white"
                                                : "hover:bg-lime-600 text-gray-700 hover:text-white", // Add hover text color here
                                            "group flex gap-x-3 rounded-md p-2 text-sm font-semibold"
                                        )}
                                    >
                                        <item.icon
                                            aria-hidden="true"
                                            className={classNames(
                                                "h-6 w-6", // Fixed height and width
                                                activeMenu === item.name
                                                    ? "text-white"
                                                    : "text-gray-400 hover:text-white" // Change to white on hover
                                            )}
                                        />
                                        {item.name}
                                    </a>
                                ) : (
                                    <Disclosure>
                                        {({ open }) => (
                                            <>
                                                <Disclosure.Button
                                                    onClick={() => {
                                                        handleMenuClick(
                                                            item.name
                                                        );
                                                        // Close the panel if the item is not active
                                                        if (
                                                            activeMenu !==
                                                            item.name
                                                        ) {
                                                            setActiveMenu(
                                                                item.name
                                                            );
                                                        } else {
                                                            setActiveMenu(null); // Close if already active
                                                        }
                                                    }}
                                                    className={classNames(
                                                        activeMenu === item.name
                                                            ? "bg-lime-500 text-white"
                                                            : "hover:bg-lime-500 text-gray-700 hover:text-white", // Add hover text color here
                                                        "group flex w-full items-center gap-x-3 rounded-md p-2 text-left text-sm font-semibold"
                                                    )}
                                                >
                                                    <item.icon
                                                        aria-hidden="true"
                                                        className={classNames(
                                                            "h-6 w-6", // Fixed height and width
                                                            activeMenu ===
                                                                item.name ||
                                                                open
                                                                ? "text-white"
                                                                : "text-gray-400 hover:text-white" // Change to white on hover
                                                        )}
                                                    />
                                                    {item.name}
                                                    <ChevronRightIcon
                                                        aria-hidden="true"
                                                        className="ml-auto h-5 w-5 text-gray-400 transition-transform duration-200 group-data-[open]:rotate-90 group-data-[open]:text-gray-500"
                                                    />
                                                </Disclosure.Button>
                                                <Disclosure.Panel
                                                    as="ul"
                                                    className="mt-1 px-2"
                                                >
                                                    {item.children.map(
                                                        (subItem) => (
                                                            <li
                                                                key={
                                                                    subItem.name
                                                                }
                                                            >
                                                                <a
                                                                    href={
                                                                        subItem.href
                                                                    }
                                                                    onClick={() =>
                                                                        handleMenuClick(
                                                                            subItem.name
                                                                        )
                                                                    }
                                                                    className={classNames(
                                                                        activeMenu ===
                                                                            subItem.name
                                                                            ? "bg-lime-500 text-white"
                                                                            : "hover:bg-lime-500 text-gray-700 hover:text-white", // Add hover text color here
                                                                        "block rounded-md py-2 pl-9 pr-2 text-sm"
                                                                    )}
                                                                >
                                                                    {
                                                                        subItem.name
                                                                    }
                                                                </a>
                                                            </li>
                                                        )
                                                    )}
                                                </Disclosure.Panel>
                                            </>
                                        )}
                                    </Disclosure>
                                )}
                            </li>
                        ))}
                    </ul>
                </nav>
            </aside>
            <main
                className={`flex flex-col h-screen w-full ${
                    activeMenu ? "bg-white" : "bg-gray-50"
                }`}
            >
                <div
                    className={`flex justify-between items-center w-full p-2 border border-gray-200 ${
                        activeMenu ? "bg-white" : "bg-gray-50"
                    }`}
                >
                    <p className="text-lg ml-4 font-semibold text-gray-900">
                        {title}
                    </p>
                    <a
                        href="#"
                        className="flex items-center gap-x-4 text-sm font-semibold text-gray-900 hover:bg-gray-50 rounded-md p-2"
                    >
                        <img
                            alt=""
                            src={`/storage/users/${auth.user.foto}`}
                            className="h-8 w-8 mr-2 rounded-full bg-gray-50"
                        />
                        <span aria-hidden="true">{auth.user.name}</span>
                    </a>
                </div>

                <div className="flex-1 overflow-hidden">
                    <div className="h-[calc(100vh-8rem)] w-full">
                        {children}
                    </div>
                </div>
                <footer className="w-full">
                    <div className="bg-white shadow-md p-4 border border-gray-200">
                        <p className="text-balance text-center text-sm text-gray-600">
                            © {new Date().getFullYear()} IdeaCourse. All rights
                            reserved.
                        </p>
                    </div>
                </footer>
            </main>
        </div>
    );
}
