<x-admin-layout title="Bcd Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Bcd List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('bcd.index') }}" value="Bcd List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('bcd.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Bcd
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:bcd.bcd-list/>
</x-admin-layout>