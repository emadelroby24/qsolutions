<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <h1 class="text-3xl font-bold text-gray-900">Qsoltions Task</h1>
                
                <!-- Filters (Static Display) -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Platform</label>
                        <select class="rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>All Platforms</option>
                            <option value="instagram">instagram</option>
                            <option value="facebook">facebook</option>
                            <option value="linkedin">linkedin</option>
                        </select>
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold opacity-100">
                        + New Post
                    </button>
                </div>
            </div>
        </div>

        <!-- Posts Grid -->
        <div id="data-container" class="grid gap-6 md:grid-cols-2 lg:grid-cols-3"></div>
    </div>

    <script>
        var url = "api/v1/post-data";
        $.ajax({
            type: 'GET',
            url: url,
            dataType: "JSON",
            success: function (data){
                console.log(data);
                $('#data-container').empty();
                $.each(data.all_posts, function(index, item) {
                    var title = '';
                    if (item.title) {
                        title = item.title;
                    } else {
                        title = 'No Title';
                    }
                    
                    var platform = '';
                    if (item.platform) {
                        platform = item.platform;
                    } else {
                        platform = 'Social Media';
                    }
                    
                    var status = '';
                    if (item.status) {
                        status = item.status;
                    } else {
                        status = 'Published';
                    }
                    
                    var content = '';
                    if (item.content) {
                        content = item.content;
                    } else if (item.description) {
                        content = item.description;
                    } else {
                        content = 'No content available';
                    }
                    
                    var date = '';
                    if (item.created_at) {
                        date = item.created_at;
                    }else {
                        date = 'Unknown date';
                    }

                    var scheduled = '';
                    if (item.scheduled_at) {
                        scheduled = '<div class="text-xs bg-yellow-200 text-yellow-800 space-y-1">' +
                        '<div>Scheduled at: ' + item.scheduled_at + '</div>' +
                        '</div>' ;
                    }
                    
                    var cardHtml = '<div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-200">' +
                        '<!-- Header -->' +
                        '<div class="p-4 border-b border-gray-200">' +
                        '<div class="flex justify-between items-start mb-3">' +
                        '<h3 class="text-lg font-semibold text-gray-900 flex-1 mr-2">' + title + '</h3>' +
                        '<div class="flex gap-1">' +
                        '<button class="text-gray-500 hover:text-blue-600 p-1 rounded cursor-not-allowed opacity-50" disabled>' +
                        '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>' +
                        '</svg>' +
                        '</button>' +
                        '<button class="text-gray-500 hover:text-red-600 p-1 rounded cursor-not-allowed opacity-50" disabled>' +
                        '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                        '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0016.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>' +
                        '</svg>' +
                        '</button>' +
                        '</div>' +
                        '</div>' +
                        '<!-- Badges -->' +
                        '<div class="flex gap-2">' +
                        '<span class="px-2 py-1 rounded-full text-xs font-semibold bg-pink-500 text-white capitalize">' + platform +
                        '</span>' +
                        '<span class="px-2 py-1 rounded-full text-xs font-semibold bg-green-200 text-green-800 capitalize">' + status +
                        '</span>' +
                        '</div>' +
                        '</div>' +
                        '<!-- Content -->' +
                        '<div class="p-4">' +
                        '<p class="text-gray-700 mb-4 leading-relaxed">' + content + '</p>' +
                        '<!-- Dates -->' +
                        '<div class="text-xs text-gray-500 space-y-1">' +
                        '<div>Created: ' + date + '</div>' +
                        '</div>' +
                        scheduled + 
                        '</div>' +
                        '</div>';
                    $('#data-container').append(cardHtml);
                });
            },
        });
    </script>

</body>
</html>