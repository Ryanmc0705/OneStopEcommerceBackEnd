<script setup>
import axios from "axios";
import { ref, reactive, onMounted } from "vue";

const columns = [
    { name: "category_id", label: "Category ID", align: "left", field: "id" },
    {
        name: "category_name",
        label: "Category Name",
        align: "left",
        field: "category_name",
    },
    {
        name: "created_at",
        label: "Created At",
        align: "left",
        field: "created_at",
    },
    {
        name: "updated_at",
        label: "Updated at",
        align: "left",
        field: "Updated At",
    },
];
const rows = ref([]);
const filter = ref("");
const loading = ref(false);

const pagination = ref({
    sortBy: "desc",
    descending: false,
    page: 1,
    rowsPerPage: 3,
    rowsNumber: 10,
});
onMounted(async () => {
    onRequest({
        pagination: pagination.value,
        filter: "",
    });
});

const onRequest = async (props) => {
    loading.value = true;
    const { page, rowsPerPage, sortBy, descending } = props.pagination;
    const filter = props.filter;
    const { data } = await axios.get(
        `Category?keyword=${props.filter}&&page=${page}`
    );
    rows.value = data.data;
    pagination.value.page = data.current_page;
    pagination.value.rowsPerPage = data.per_page;
    pagination.value.sortBy = sortBy;
    pagination.value.descending = descending;
    pagination.value.rowsNumber = data.total;
    loading.value = false;
};
</script>
<template>
    <div class="row">
        <div class="q-pa-md q-gutter-sm">
            <q-btn color="primary" icon="add" label=" New Category" />
            
        </div>
        <q-table
            :rows="rows"
            :columns="columns"
            :filter="filter"
            v-model:pagination="pagination"
            :loading="loading"
            @request="onRequest"
            title="Categories"
            :table-header-style="{
                backgroundColor: '#027BE3',
                color: '#FFFFFF',
            }"
            style="width: 100%"
        >
            <template #loading>
                <q-inner-loading showing color="blue" />
            </template>
            <!-- <template v-slot:body-cell-actions="props">
                                <q-td :props="props">
                                    <q-btn-group rounded>
                                        <q-btn  color="green" icon-right="mode_edit" @click="save = false;code = props.row.env_code; desc=props.row.env_desc;small = true;operation = 'update';id =props.row.id "  size="xs">Edit</q-btn>
                                        <q-btn  color="deep-orange" icon-right="delete" size="xs" @click="confirmation(props.row.id);">Delete</q-btn>
                                    </q-btn-group>
                                </q-td>
                            </template> -->
            <template v-slot:top-right>
                <q-input
                    borderless
                    dense
                    debounce="300"
                    v-model="filter"
                    placeholder="Search"
                >
                    <template v-slot:append>
                        <q-icon name="search" />
                    </template>
                </q-input>
            </template>
        </q-table>
    </div>
  
</template>
<style>
.content {
    max-width: 100%;
    height: 100%;
}
</style>
