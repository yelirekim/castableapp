//
//  Podcast+CoreDataProperties.m
//  
//
//  Created by Mike Riley on 2/23/18.
//
//

#import "Podcast+CoreDataProperties.h"

@implementation Podcast (CoreDataProperties)

+ (NSFetchRequest<Podcast *> *)fetchRequest {
	return [[NSFetchRequest alloc] initWithEntityName:@"Podcast"];
}

@dynamic title;
@dynamic phid;

@end
