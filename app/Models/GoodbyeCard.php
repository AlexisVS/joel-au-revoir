<?php

namespace App\Models;

use Database\Factories\GoodbyeCardFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property int $id
 * @property string $author_name
 * @property string|null $author_email
 * @property string $message
 * @property int $has_asset
 * @property string|null $card_color
 * @property string|null $asset_type
 * @property string|null $asset_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static GoodbyeCardFactory factory($count = null, $state = [])
 * @method static Builder|GoodbyeCard newModelQuery()
 * @method static Builder|GoodbyeCard newQuery()
 * @method static Builder|GoodbyeCard query()
 * @method static Builder|GoodbyeCard whereAssetPath($value)
 * @method static Builder|GoodbyeCard whereAssetType($value)
 * @method static Builder|GoodbyeCard whereAuthorEmail($value)
 * @method static Builder|GoodbyeCard whereAuthorName($value)
 * @method static Builder|GoodbyeCard whereCardColor($value)
 * @method static Builder|GoodbyeCard whereCreatedAt($value)
 * @method static Builder|GoodbyeCard whereHasAsset($value)
 * @method static Builder|GoodbyeCard whereId($value)
 * @method static Builder|GoodbyeCard whereMessage($value)
 * @method static Builder|GoodbyeCard whereUpdatedAt($value)
 * @mixin Eloquent
 */
class GoodbyeCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name',
        'author_email',
        'message',
        'has_asset',
        'card_color',
        'asset_type',
        'asset_path',
    ];
}
