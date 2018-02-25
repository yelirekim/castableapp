//
//  Podcast+CoreDataProperties.h
//  
//
//  Created by Mike Riley on 2/23/18.
//
//

#import "Podcast+CoreDataClass.h"


NS_ASSUME_NONNULL_BEGIN

@interface Podcast (CoreDataProperties)

+ (NSFetchRequest<Podcast *> *)fetchRequest;

@property (nullable, nonatomic, copy) NSString *title;
@property (nullable, nonatomic, copy) NSString *phid;

@end

NS_ASSUME_NONNULL_END
