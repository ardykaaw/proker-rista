#!/bin/bash

echo "🔧 Testing Category Fix..."

# Test 1: Check if create form has "lainnya" option
echo "📋 Test 1: Checking create form..."
if grep -q 'value="lainnya"' resources/views/admin/products/create.blade.php; then
    echo "✅ Create form has 'lainnya' category option"
else
    echo "❌ Create form missing 'lainnya' category option"
fi

# Test 2: Check if edit form has "lainnya" option
echo "📋 Test 2: Checking edit form..."
if grep -q 'value="lainnya"' resources/views/admin/products/edit.blade.php; then
    echo "✅ Edit form has 'lainnya' category option"
else
    echo "❌ Edit form missing 'lainnya' category option"
fi

# Test 3: Check if produk page filter has "lainnya" option
echo "📋 Test 3: Checking produk page filter..."
if grep -q 'value="lainnya"' resources/views/produk.blade.php; then
    echo "✅ Produk page filter has 'lainnya' category option"
else
    echo "❌ Produk page filter missing 'lainnya' category option"
fi

# Test 4: Check if controller validation includes "lainnya"
echo "📋 Test 4: Checking controller validation..."
if grep -q 'in:makanan,kerajinan,pertanian,lainnya' app/Http/Controllers/AdminProductController.php; then
    echo "✅ Controller validation includes 'lainnya' category"
else
    echo "❌ Controller validation missing 'lainnya' category"
fi

# Test 5: Check for duplicate "pertanian" option in create form
echo "📋 Test 5: Checking for duplicate options..."
pertanian_count=$(grep -c 'value="pertanian"' resources/views/admin/products/create.blade.php)
if [ "$pertanian_count" -eq 1 ]; then
    echo "✅ No duplicate 'pertanian' options found"
else
    echo "❌ Found $pertanian_count 'pertanian' options (should be 1)"
fi

echo ""
echo "🎯 Category Fix Test Complete!"
echo "📊 Summary:"
echo "   - Create form: $(grep -q 'value="lainnya"' resources/views/admin/products/create.blade.php && echo '✅' || echo '❌')"
echo "   - Edit form: $(grep -q 'value="lainnya"' resources/views/admin/products/edit.blade.php && echo '✅' || echo '❌')"
echo "   - Produk filter: $(grep -q 'value="lainnya"' resources/views/produk.blade.php && echo '✅' || echo '❌')"
echo "   - Controller validation: $(grep -q 'in:makanan,kerajinan,pertanian,lainnya' app/Http/Controllers/AdminProductController.php && echo '✅' || echo '❌')"
echo "   - No duplicates: $([ "$pertanian_count" -eq 1 ] && echo '✅' || echo '❌')"
