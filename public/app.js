const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

$(document).ready(function () {

    //Add Rows
    $('.addExperience').click(function () {
        $('.exp-firstrow').parent().append(
            `
                    <tr>
                            <td><input type="text" class="form-control" name="company[]" required></td>
                            <td><input type="text" class="form-control" name="jobtitle[]" required></td>
                            <td><input type="number" class="form-control" name="exp_year[]" required></td>
                        <td>
                            <button class="btn btn-danger deleteExp"><i class="bi bi-archive"></i></button>
                        </td>
                    /tr>
                    `);
    });
    $('.addEducation').click(function () {
        $('.edu-firstrow').parent().append(
            `
                    
                    <tr>
                        <td><input type="text" class="form-control" name="degree[]" required></td>
                        <td><input type="text" class="form-control" name="institution[]" required></td>
                        <td><input type="date" class="form-control" name="completion_year[]" required></td>
                        <td><input type="text" class="form-control" name="gpa[]" required></td>
                        <td>
                            <button class="btn btn-danger deleteEdu"><i class="bi bi-archive"></i></button>
                        </td>

                    </tr>
                    `);
    });
    $('.addFamily').click(function () {
        $('.rel-firstrow').parent().append(
            `
                    <tr>
                            <td><input type="text" class="form-control" name="rel_fname[]" required></td>
                            <td><input type="text" class="form-control" name="rel_lname[]" required></td>
                            <td>
                                <select class="form-select" name="relationship[]" required>
                                    <option value="">--Select Relationship--</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Sibling">Sibling</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Others">Others</option>

                                </select>
                            </td>
                            <td><input type="date" class="form-control" name="rel_dob[]" required></td>
                            <td><input type="text" class="form-control" name="rel_occupation[]" required></td>
                            <td>
                            <button class="btn btn-danger deleteFam"><i class="bi bi-archive"></i></button>
                        </td>

                        </tr>
                    `);
    });

    //Delete Rows
    $(document).on('click', '.deleteExp', function () {
        $(this).parent().parent().remove();
    });
    $(document).on('click', '.deleteEdu', function () {
        $(this).parent().parent().remove();
    });
    $(document).on('click', '.deleteFam', function () {
        $(this).parent().parent().remove();
    });


    $(document).on('click', '.delete-confirmation', function () {
        // console.log('triggered');

        var id = $(this).data('id');
        var route = $(this).data('route');
        var tableId = $(this).closest('table').attr('id');



        $('#confirmationModal').data('id', id); // Set the data-id attribute of the modal
        $('#confirmationModal').data('route', route); // Set the data-route attribute of the modal
        $('#confirmationModal').data('table-id', tableId); // Set the data-route attribute of the modal

        $('#confirmationModal').modal('show'); // Show the modal

        console.log(route+id);

    });

    
    
    
});


function submitRequest(){
    var id = $('#confirmationModal').data('id')
    var url = $('#confirmationModal').data('route') + id;
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var tableId = $('#confirmationModal').data('tableId');


    console.log(url);

    $.ajax({
        url: url,
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response){
            console.log(response);
            $('#' + tableId).find('[data-id="' + id + '"]').closest('tr').remove();

            $('#confirmationModal').modal('hide');



        },
        error: function(error) {
            // Handle error
            console.error(error);
        }
    });


    
}

let table = new DataTable('#emp-table');